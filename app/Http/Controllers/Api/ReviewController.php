<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ReviewRequest;
use App\Repositories\ReviewRepositoryInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
	protected $reviewRepo;

	public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }
	public function store(ReviewRequest $request){
		$data = $this->reviewRepo->createDetail($request->all());
		return $this->success($data);
	}

	public function paginate($id){
		$data = $this->reviewRepo->paginate($id);
		return $this->success($data);
	}

}
