<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = 'categories';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

	public function homestays(): BelongsToMany
	{
		return $this->belongsToMany(Homestay::class, 'category_homestay', 'category_id', 'homestay_id');
	}
	
}
