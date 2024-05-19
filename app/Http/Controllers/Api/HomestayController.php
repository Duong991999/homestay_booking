<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\HomestayRequest;
use App\Repositories\HomeStayRepositoryInterface;

class HomestayController extends Controller
{
	protected $homestayRepo;

	public function __construct(HomeStayRepositoryInterface $homestayRepo)
    {
        $this->homestayRepo = $homestayRepo;
    }

	public function index(){
		return $this->success($this->homestayRepo->getAll());
	}

	public function show($id){
		return $this->success($this->homestayRepo->find($id));
	}

	public function store(HomestayRequest $request){
		$data = $this->homestayRepo->create($request->all());
		return $this->success($data);
	}

	public function update(HomestayRequest $request, $id){
		$data = $this->homestayRepo->update($id, $request->all());
		return $this->success($data);
	}

}
