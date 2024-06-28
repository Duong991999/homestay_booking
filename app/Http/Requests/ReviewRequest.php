<?php

namespace App\Http\Requests;

use App\Booking;

class ReviewRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'rating' => 'bail|required|integer|min:1|max:5',
			'booking_id' => 'bail|required',
		];
	}

	protected function passedValidation()
	{
		// dd(auth()->user());
		if (!$this->get('user_id')) {
			$this->merge([
				'user_id' => auth()->user()->id
			]);
		}
		if ($this->get('booking_id')) {
			$this->merge([
				'homestay_id' => Booking::find($this->get('booking_id'))->homestay_id
			]);
		}
	}
}
