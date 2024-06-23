<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BookingRequest;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\RoomRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
	protected $bookingRepo;
	protected $roomRepo;

	public function __construct(BookingRepositoryInterface $bookingRepo, RoomRepositoryInterface $roomRepo)
    {
        $this->bookingRepo = $bookingRepo;
        $this->roomRepo = $roomRepo;
    }

	public function index(){
		return $this->success($this->bookingRepo->getAll());
	}

	public function show($id){
		return $this->success($this->bookingRepo->findDetail($id));
	}

	public function store(BookingRequest $request){
		$data = $this->bookingRepo->createDetail($request->all());
		return $this->success($data);
	}


	public function delete(Request $request){
		$this->bookingRepo->delete($request->get('id'));
		return $this->success();
	}

	public function assign($id){
		$this->roomRepo->assign($id);
		return $this->success();
	}
	
}
