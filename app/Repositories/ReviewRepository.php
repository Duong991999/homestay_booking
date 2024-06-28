<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
	public function getModel()
	{
		return Review::class;
	}

	public function paginate($homestayId)
	{
		return $this->model->where('homestay_id', $homestayId)->paginate(10)->appends(Request::query());
	}

	public function createDetail($attributes){
		$homestayId = $attributes['homestay_id'];
        $data = parent::create($attributes);
		$rating = DB::table('reviews')
            ->where('homestay_id', '=', $homestayId)
            ->groupBy('homestay_id')
            ->select('homestay_id', DB::raw('AVG(rating) as average_rating'))
            ->first()->average_rating;
		app(HomestayRepository::class)->update($homestayId, ['rating' => $rating]);
		return true;
	}
}
