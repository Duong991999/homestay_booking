<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RoomTypeRequest;
use App\Repositories\RoomTypeRepositoryInterface;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
	protected $roomTypeRepo;

	public function __construct(RoomTypeRepositoryInterface $roomTypeRepo)
    {
        $this->roomTypeRepo = $roomTypeRepo;
    }

	public function index(){
		return $this->success($this->roomTypeRepo->paginateAll());
	}

	public function myRoomType(){
		return $this->success($this->roomTypeRepo->myRoomType());
	}

	public function show($id){
		return $this->success($this->roomTypeRepo->findDetail($id));
	}

	public function store(RoomTypeRequest $request){
		$data = $this->roomTypeRepo->createDetail($request->all());
		return $this->success($data);
	}

	public function update(RoomTypeRequest $request, $id){
		$data = $this->roomTypeRepo->updateDetail($id, $request->all());
		return $this->success($data);
	}

	public function delete(Request $request){
		$this->roomTypeRepo->delete($request->get('id'));
		return $this->success();
	}
}
