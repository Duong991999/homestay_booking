<?php
namespace App\Repositories;

use App\Category;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Category::class;
    }

    public function getProduct()
    {
        return $this->model->select('product_name')->take(5)->get();
    }
}
