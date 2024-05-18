<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

	public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

	public function index(){
		return $this->success($this->categoryRepo->getAll());
	}

	public function show($id){
		return $this->success($this->categoryRepo->find($id));
	}


}
