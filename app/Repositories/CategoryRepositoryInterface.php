<?php
namespace App\Repositories;


interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
}
