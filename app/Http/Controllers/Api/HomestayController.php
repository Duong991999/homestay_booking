<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\HomestayRequest;
use App\Repositories\HomeStayRepositoryInterface;
use Illuminate\Http\Request;

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
		return $this->success($this->homestayRepo->findDetail($id));
	}

	public function showDetail($id){
		return $this->success($this->homestayRepo->findDetailRoom($id));
	}

	public function store(HomestayRequest $request){
		$data = $this->homestayRepo->createDetail($request->all());
		return $this->success($data);
	}

	public function update(HomestayRequest $request, $id){
		$data = $this->homestayRepo->updateDetail($id, $request->all());
		return $this->success($data);
	}

	public function delete(Request $request){
		$this->homestayRepo->delete($request->get('id'));
		return $this->success();
	}
}
