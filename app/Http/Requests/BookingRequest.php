<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\RequiredIf;

class BookingRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'homestay_id' => 'bail|required',
			'checkin_date' => 'bail|required|date|after_or_equal:today',
			'checkout_date' => 'bail|required|date|after:checkin_date',
			// 'guest_name' => ['bail', new RequiredIf(!Auth::user()), 'required'],
			// 'phone_number' => ['bail', new RequiredIf(!Auth::user()), 'required'],
			'guest_name' => ['bail', 'required'],
			'phone_number' => ['bail','required'],
			'booking_details' => 'bail|required|array|min:1',
			'booking_details.*.room_type_id' => 'bail|required',
			'booking_details.*.count' => 'bail|required|integer|min:1',
			'user_id' => 'bail|nullable'
		];
	}

	protected function prepareForValidation()
	{
		$user = Auth::user();
		if ($user) {
			$this->merge([
				'user_id' => Auth::user()->id
			]);
			// if (!$this->guest_name) {
			// 	$this->merge([
			// 		'guest_name' => $user->name
			// 	]);
			// }
			// if (!$this->phone_number) {
			// 	$this->merge([
			// 		'phone_number' => $user->phone_number
			// 	]);
			// }
		}
	}
}
