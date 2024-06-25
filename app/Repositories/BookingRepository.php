<?php

namespace App\Repositories;

use App\Booking;
use App\BookingDetail;
use App\Repositories\BaseRepository;
use App\RoomCount;
use App\RoomType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
	public function getModel()
	{
		return Booking::class;
	}

	public function create($attributes = [])
	{
	}

	private function findByColumn($array, $columnName, $value)
	{
		foreach ($array as $item) {
			if ($item[$columnName] == $value) {
				return $item;
			}
		}
		return null;
	}

	public function checkCanBooking($bookingDetails, $checkinDate, $checkoutDate)
	{
		$roomTypeIdList = array_column($bookingDetails, 'room_type_id');
		$roomData = RoomType::with(['room_counts' => function ($q) use ($checkinDate, $checkoutDate) {
			$q->whereDate('date', '>=', $checkinDate)
				->whereDate('date', '<', $checkoutDate);
		}])->whereIn('id', $roomTypeIdList)->get()->toArray();
		$roomCountUpdate = ['update' => [], 'create' => []];

		foreach ($bookingDetails as $booking) {
			$roomTypeId = $booking['room_type_id'];
			$countBooking = $booking['count'];
			$currentDate = $checkinDate;
			$roomType = $this->findByColumn($roomData, 'id', $roomTypeId);
			$roomCounts = $roomType['room_counts'];
			$roomTypeCount = $roomType['count'];
			while ($currentDate < $checkoutDate) {
				$daySlot = $this->findByColumn($roomCounts, 'date', $currentDate);

				$currentSlot = $roomTypeCount - ($daySlot ? $daySlot['count'] : 0);
				if ($currentSlot < $countBooking) {
					return [
						'status' => false,
						'date' => $currentDate,
						'max_slot' => $currentSlot,
						'room_type' => $roomType
					];
				} else {
					if ($daySlot) {
						$roomCountUpdate['update'][] = [
							'id' => $daySlot['id'],
							'count' => $daySlot['count'] + $countBooking
						];
					} else {
						$roomCountUpdate['create'][] = [
							'count' => $countBooking,
							'date' => $currentDate,
							'room_type_id' => $roomTypeId
						];
					}
					$currentDate = date('Y-m-d', strtotime($currentDate . '+1 day'));
				}
			}
		}

		return ['status' => true, 'room_count' => $roomCountUpdate];
	}
	public function createDetail($attributes)
	{
		$data = $this->checkCanBooking($attributes['booking_details'], $attributes['checkin_date'], $attributes['checkout_date']);
		if ($data['status']) {
			$roomCount = $data['room_count'];
			try {
				$result = DB::transaction(function () use ($attributes, $data, $roomCount) {
					$booking = parent::create($attributes);
					$bookingDetails = collect([]);
					foreach ($attributes['booking_details'] as $bookingDetail) {
						$bookingDetail = BookingDetail::make($bookingDetail);
						$bookingDetails->push($bookingDetail);
					}
					$bookingDetails = $this->model->find($booking['id'])->booking_details()->saveMany($bookingDetails);
					// if ($roomCount['create']) {
					// 	RoomCount::insert($roomCount['create']);
					// }
					// if ($roomCount['update']) {
					// 	foreach ($roomCount['update'] as $update) {
					// 		RoomCount::find($update['id'])->update(['count' => $update['count']]);
					// 	}
					// }
					return [
						'status' => true,
						'data' => $booking
					];
				});
				return $result;
			} catch (QueryException $e) {
				throw new HttpResponseException(
					response()->json([
						'success'   => false,
						'message'   => 'Query errors',
						'errors'    => $e->getMessage()
					], Response::HTTP_BAD_REQUEST)
				);
			}
		} else {
			return $data;
		}
	}

	public function findDetail($id)
	{
		return $this->model->with('booking_details')->find($id);
	}

	public function changeStatus($status, $bookingId)
	{
		$bookingDetails = Booking::with('booking_details')->find($bookingId)->toArray();
		if ($status == 1 && $bookingDetails['status'] == 0) {
			$data = app(BookingRepository::class)->checkCanBooking($bookingDetails['booking_details'], $bookingDetails['checkin_date'], $bookingDetails['checkout_date']);
			if ($data['status']) {
				$roomCount = $data['room_count'];
				try {
					$result = DB::transaction(function () use ($roomCount, $bookingId, $status) {
						if ($roomCount['create']) {
							RoomCount::insert($roomCount['create']);
						}
						if ($roomCount['update']) {
							foreach ($roomCount['update'] as $update) {
								RoomCount::find($update['id'])->update(['count' => $update['count']]);
							}
						}
						$booking = $this->model->find($bookingId)->update(['status' => $status]);
						return $booking;
					});
					return $this->model->find($bookingId);
				} catch (QueryException $e) {
					throw new HttpResponseException(
						response()->json([
							'success'   => false,
							'message'   => 'Query errors',
							'errors'    => $e->getMessage()
						], Response::HTTP_BAD_REQUEST)
					);
				}
			} else {
				return $data;
			}
		} else {
			$booking = $this->model->find($bookingId)->update(['status' => $status]);
			return $this->model->find($bookingId);
		}
	}

	public function paginateUserSearch($attributes)
	{
		$userId = auth()->user()->id;
		$bookingWhere = ['user_id' => $userId];
		if (isset($attributes['status'])) {
			$bookingWhere['status'] = $attributes['status'];
		}
		if (isset($attributes['checkin_date'])) {
			$bookingWhere['checkin_date'] = $attributes['checkin_date'];
		}
		if (isset($attributes['checkout_date'])) {
			$bookingWhere['checkout_date'] = $attributes['checkout_date'];
		}
		$data  = $this->model->where($bookingWhere);
		if (isset($attributes['date'])) {
			$data = $data->where('checkin_date', '<=', $attributes['date'])->where('checkout_date', '>=', $attributes['date']);
		}
		if (isset($attributes['homestay_name'])) {
			$data = $data->whereHas('homestay', function ($q1) use ($attributes) {
				$q1->where('name', $attributes['homestay_name']);
			});
		}
		return $data->orderBy('updated_at', 'desc')->paginate(10)->appends(Request::query());
	}

	public function paginateCompanySearch($attributes)
	{
		$userId = auth()->user()->id;
		$bookingWhere = [];
		if (isset($attributes['status'])) {
			$bookingWhere['status'] = $attributes['status'];
		}
		if ($attributes['checkin_date'] ?? 0) {
			$bookingWhere['checkin_date'] = $attributes['checkin_date'];
		}
		if ($attributes['checkout_date'] ?? 0) {
			$bookingWhere['checkout_date'] = $attributes['checkout_date'];
		}
		$data  = $this->model;
		if($bookingWhere){
			$data = $data->where($bookingWhere);
		}
		if ($attributes['date'] ?? 0) {
			$data = $data->where('checkin_date', '<=', $attributes['date'])->where('checkout_date', '>=', $attributes['date']);
		}
		$data = $data->whereHas('homestay', function ($q1) use ($userId) {
			$q1->where('user_id', $userId);
		});
		return $data->orderBy('updated_at', 'desc')->paginate(10)->appends(Request::query());
	}
}
