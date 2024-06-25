<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Homestay extends Model
{
    protected $table = 'homestays';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'content', 'user_id', 'city_code', 'district_code', 'ward_code', 'city_name', 'district_name', 'ward_name', 'address', 'min_price', 'max_price'
    ];

	public function categories(): BelongsToMany
	{
		return $this->belongsToMany(Category::class, 'category_homestay', 'homestay_id', 'category_id');
	}

	/**
     * Get all of the homestay's files.
     */
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

	public function room_types(){
		return $this->hasMany(RoomType::class);
	}

	public function bookings(){
		return $this->hasMany(Booking::class);
	}
}
