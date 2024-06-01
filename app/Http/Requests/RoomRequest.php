<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => [
				'bail',
				'required',
				Rule::unique('rooms')->ignore($this->id ?? '')->where(function($query){
					$query->where('room_type_id',  $this->room_type_id);
				})
			],
			'room_type_id' => 'bail|required',
			'status' => 'bail',
			'user_id' => 'bail',
		];
	}
}
