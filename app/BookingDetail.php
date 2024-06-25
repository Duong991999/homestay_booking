<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BookingDetail extends Model
{
    protected $table = 'booking_details';
	protected $fillable = [
        'booking_id', 'count', 'checkin_date', 'room_type_id', 'room_id_list'
    ];

	public function booking():BelongsTo
	{
		return $this->belongsTo(Booking::class);
	}
	public function room_type():BelongsTo
	{
		return $this->belongsTo(RoomType::class);
	}

	public function rooms(): BelongsToMany
	{
		return $this->belongsToMany(Room::class, 'booking_detail_room', 'booking_detail_id', 'room_id');
	}
    
}
