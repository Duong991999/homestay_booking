<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Room;
use App\RoomType;
use Illuminate\Support\Facades\Auth;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    public function getModel()
    {
        return Room::class;
    }

	public function create($attributes = [])
	{
		$room = parent::create($attributes);
		if($room){
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

	public function myRoom($roomTypeId, $itemPerPage = 10){
		return RoomType::find($roomTypeId)->rooms()->paginate($itemPerPage);
	}

	public function getAllMyRoom($roomTypeId){
		return $this->model->where('room_type_id', $roomTypeId)->get();
	}

	public function findDetail($id){
		$result = $this->model->with('files')->find($id);
		return $result;
	}

}
