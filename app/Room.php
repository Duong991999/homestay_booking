<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $table = 'rooms';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'room_type_id', 'status', 'user_id'
	];

	public function room_type(): BelongsTo
	{
		return $this->belongsTo(RoomType::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

}
