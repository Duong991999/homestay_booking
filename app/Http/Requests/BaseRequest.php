<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

abstract class BaseRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	abstract public function rules();

	public function failedValidation(Validator $validator)
	{
		throw new HttpResponseException(
			response()->json([
				'success'   => false,
				'message'   => 'Validation Failed',
				'errors'    => $validator->errors()
			], Response::HTTP_UNPROCESSABLE_ENTITY)
		);
	}
}
