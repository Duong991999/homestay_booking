<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomCount extends Model
{
	protected $table = 'room_counts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'room_type_id', 'date', 'count'
	];

	public function room_type(): BelongsTo
	{
		return $this->belongsTo(RoomType::class);
	}
}
