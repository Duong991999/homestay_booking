<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $table = 'bookings';
	protected $fillable = [
        'homestay_id', 'user_id', 'checkin_date', 'checkout_date', 'status', 'guest_name', 'bill_value', 'email', 'phone_number'
    ];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function homestay(): BelongsTo
	{
		return $this->belongsTo(Homestay::class);
	}

	public function booking_details(): HasMany
	{
		return $this->hasMany(BookingDetail::class);
	}
}
