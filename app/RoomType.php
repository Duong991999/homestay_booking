<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class RoomType extends Model
{
	protected $table = 'room_types';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'homestay_id', 'price', 'count'
	];

	public function rooms()
	{
		return $this->hasMany(Room::class);
	}

	public function homestay()
	{
		return $this->belongsTo(Homestay::class);
	}

	public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

	public function room_counts(): HasMany
	{
		return $this->hasMany(RoomCount::class);
	}

	public function booking_details(): HasMany
	{
		return $this->hasMany(BookingDetail::class);
	}
}
