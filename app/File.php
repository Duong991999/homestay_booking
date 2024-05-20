<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name', 'file_path', 'fileable_id', 'fileable_type'
    ];

	/**
     * Get the parent fileable table model.
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

}
