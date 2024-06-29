<?php

namespace App\Repositories;

use App\Booking;
use App\Repositories\BaseRepository;
use App\Room;
use App\RoomType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
	public function getModel()
	{
		return Room::class;
	}

	public function create($attributes = [])
	{
		$room = parent::create($attributes);
		if ($room) {
			$countRoom = RoomType::find($room['room_type_id'])->rooms()->count();
			RoomType::find($room['room_type_id'])->update([
				'count' => $countRoom
			]);
		}
		return $room;
	}

	public function delete($id)
	{
		$roomType =  $this->model->find($id)->room_type()->get();
		$countRoom = RoomType::find($roomType->id)->rooms()->count();
		RoomType::find($roomType->id)->update([
			'count' => $countRoom
		]);
		return parent::delete($id);
	}

	public function myRoom($roomTypeId, $itemPerPage = 10)
	{
		return RoomType::find($roomTypeId)->rooms()->paginate($itemPerPage);
	}

	public function getAllMyRoom($roomTypeId)
	{
		return $this->model->where('room_type_id', $roomTypeId)->get();
	}

	public function findDetail($id)
	{
		$result = $this->model->with('files')->find($id);
		return $result;
	}

	public function assign($bookingId)
	{
		$bookingDetail = app(BookingRepository::class)->findDetail($bookingId)->toArray();
		if ($bookingDetail['status'] > 1) {
			return Booking::with('booking_details.rooms')->find($bookingId)->toArray();
		}
		$roomTypeList = array_column($bookingDetail['booking_details'], 'room_type_id');
		$checkinDate = $bookingDetail['checkin_date'];
		$checkoutDate = $bookingDetail['checkout_date'];
		$rooms = $this->model->whereDoesntHave('booking_details', function ($query) use ($checkinDate, $checkoutDate) {
			$query->whereHas('booking', function ($q) use ($checkinDate, $checkoutDate) {
				return $q->where('checkin_date', '<=', $checkoutDate)->where('checkout_date', '>=', $checkinDate);
			});
		})->whereIn('room_type_id', $roomTypeList)->get()->toArray();
		$insert = [];
		foreach ($bookingDetail['booking_details'] as $detail) {
			$count = 0;
			foreach ($rooms as $room) {
				if ($room['room_type_id'] == $detail['room_type_id']) {
					$insert[] = [
						'booking_detail_id' => $detail['id'],
						'room_id' => $room['id']
					];
					$count++;
				}
				if ($count == $detail['count']) {
					break;
				}
			}
			if ($count < $detail['count']) {
				return false;
			}
		}

		DB::table('booking_detail_room')->insertOrIgnore($insert);
		app(BookingRepository::class)->update($bookingId, ['status' => 2]);
		return Booking::with('booking_details.rooms')->find($bookingId)->toArray();
	}
	public function getStatus($attributes, $id)
	{
		$date = $attributes['date'] ?? Carbon::today()->format('Y-m-d');
		$rooms = $this->model
			->whereHas('booking_details', function ($query) use ($date) {
				$query->whereHas('booking', function ($q) use ($date) {
					return $q->where('checkin_date', '<=', $date)->where('checkout_date', '>=', $date);
				});
			})
			->whereHas('room_type', function ($q) use ($id) {
				$q->where('homestay_id', $id);
			})->get(['id'])->toArray();
		$bookedRooms = array_column($rooms, 'id');

		// $roomsFilter = $this->model->with(['room_type'=> function($q){
		// 	return $q->select('id', 'name');
		// }])
		// ->select('id', 'name', 'room_type_id')
		// ->selectRaw("IF(id IN (" . implode(',', $bookedRooms) . "), 1, 0) AS current_status") // 1: phòng đã book, 0: phòng đang trống
		// ->get()->toArray();

		$roomsFilter = RoomType::with(['rooms' => function ($q) use ($bookedRooms) {
			if ($bookedRooms) {
				return $q->select('id', 'name', 'room_type_id')->selectRaw("IF(id IN (" . implode(',', $bookedRooms) . "), 1, 0) AS current_status"); // 1: phòng đã book, 0: phòng đang trống

			} else {
				return $q->select('id', 'name', 'room_type_id')->selectRaw("0 AS current_status");
			}
		}])
			->select('id', 'name')
			->get()->toArray();
		return $roomsFilter;
	}

}
