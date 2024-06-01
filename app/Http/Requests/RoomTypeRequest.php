<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomTypeRequest extends BaseRequest
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
				Rule::unique('room_types')->ignore($this->id ?? '')->where(function($query){
					$query->where('homestay_id',  $this->homestay_id);
				})
			],
			'homestay_id' => 'bail|required',
			'price' => 'bail',
			'count' => 'bail',
		];
	}

	protected function prepareForValidation()
    {
		if(!$this->homestay_id){
			$this->merge([
				'homestay_id' => Auth::user()->homestays()->first()->id
			]);
		}

    }

}
