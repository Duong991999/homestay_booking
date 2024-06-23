<?php
namespace App\Repositories;


interface RoomRepositoryInterface extends BaseRepositoryInterface
{
	public function myRoom($roomTypeId, $itemPerPage = 10);
	public function getAllMyRoom($roomTypeId);
	public function assign($bookingId);
	public function getStatus($attributes, $id);
}
