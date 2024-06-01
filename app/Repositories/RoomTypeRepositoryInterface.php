<?php
namespace App\Repositories;


interface RoomTypeRepositoryInterface extends BaseRepositoryInterface
{
	public function findDetail($id);
	public function createDetail($attributes);
	public function updateDetail($id, $attributes);
	public function myRoomType($itemPerPage = 10);
}
