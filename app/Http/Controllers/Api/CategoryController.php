<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
		return $this->success($this->categoryRepo->paginateAll());
	}

	public function all(){
		return $this->success($this->categoryRepo->getAll());
	}

	public function show($id){
		return $this->success($this->categoryRepo->find($id));
	}

	public function store(CategoryRequest $request){
		$data = $this->categoryRepo->create($request->all());
		return $this->success($data);
	}

	public function update(CategoryRequest $request, $id){
		$data = $this->categoryRepo->update($id, $request->all());
		return $this->success($data);
	}

	public function delete(Request $request){
		$this->categoryRepo->delete($request->get('id'));
		return $this->success();
	}

}
