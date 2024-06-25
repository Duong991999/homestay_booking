<?php
namespace App\Repositories;


interface BookingRepositoryInterface extends BaseRepositoryInterface
{
	public function createDetail($attributes);
	public function findDetail($id);
	public function changeStatus($status, $id);
	public function paginateUserSearch($attributes);
	public function paginateCompanySearch($attributes);

}
