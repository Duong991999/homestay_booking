<?php
namespace App\Repositories;


interface ReviewRepositoryInterface extends BaseRepositoryInterface
{
	public function paginate($homestayId);
	public function createDetail($attributes);
}
