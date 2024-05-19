<?php

namespace App;

use App\Bookable;
use App\Booking;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['id', 'content', 'rating'];

    public function user()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
