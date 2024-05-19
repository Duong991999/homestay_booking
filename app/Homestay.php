<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Homestay extends Model
{
    protected $table = 'homestays';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'city_code', 'district_code', 'ward_code'
    ];

	public function categories(): BelongsToMany
	{
		return $this->belongsToMany(Category::class, 'category_homestay', 'homestay_id', 'category_id');
	}
}
