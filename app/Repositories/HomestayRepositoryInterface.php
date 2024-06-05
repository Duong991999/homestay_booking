<?php
namespace App\Repositories;


interface HomeStayRepositoryInterface extends BaseRepositoryInterface
{
	public function findDetail($id);
	public function findDetailRoom($id);
	public function createDetail($attributes);
	public function updateDetail($id, $attributes);
	public function paginateSearch($attributes);
	function updatePriceToHomeStay($id);
}
