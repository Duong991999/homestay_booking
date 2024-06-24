<?php
namespace App\Repositories;


interface BookingRepositoryInterface extends BaseRepositoryInterface
{
	public function createDetail($attributes);
	public function findDetail($id);
	public function changeStatus($status, $id);

}
