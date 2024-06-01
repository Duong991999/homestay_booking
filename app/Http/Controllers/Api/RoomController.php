<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RoomRequest;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
	protected $roomRepo;

	public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

	public function index(){
		return $this->success($this->roomRepo->paginateAll());
	}

	public function all($id){
		return $this->success($this->roomRepo->getAllMyRoom($id));
	}

	public function myRoom($id){
		return $this->success($this->roomRepo->myRoom($id));
	}

	public function show($id){
		return $this->success($this->roomRepo->find($id));
	}

	public function store(RoomRequest $request){
		$data = $this->roomRepo->create($request->all());
		return $this->success($data);
	}

	public function update(RoomRequest $request, $id){
		$data = $this->roomRepo->updateDetail($id, $request->all());
		return $this->success($data);
	}

	public function delete(Request $request){
		$this->roomRepo->delete($request->get('id'));
		return $this->success();
	}
}
