<?php

namespace App\Http\Requests;

class HomestayRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id' => 'bail|nullable|exists:users,id',
			'name' => 'required',
			'content' => 'required',
			'city_code' => 'required',
			'district_code' => 'required',
			'ward_code' => 'required',
			'category_id' => 'bail|nullable|array',
			'files' => 'nullable|array',
			'files.*' => 'bail|image|mimes:jpeg,png,gif,jpg|max:2048',
		];
	}

	protected function passedValidation()
	{
		if (!$this->get('user_id')) {
			$this->merge([
				'user_id'   =>  auth()->user()->id
			]);
		}
	}
}
