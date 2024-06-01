<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BookingRequest;
use App\Repositories\BookingRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
	protected $bookingRepo;

	public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
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

	public function update(HomestayRequest $request, $id){
		$data = $this->bookingRepo->updateDetail($id, $request->all());
		return $this->success($data);
	}

	public function delete(Request $request){
		$this->bookingRepo->delete($request->get('id'));
		return $this->success();
	}
}
