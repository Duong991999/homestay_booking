<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function success($data = null, $msg = 'success', $code = Response::HTTP_OK){
		return response()->json([
			'success' => true,
			'data' => $data,
			'message' => $msg
		], $code);
	}

	public function error($msg = 'error', $code = Response::HTTP_BAD_REQUEST){
		return response()->json([
			'success' => false,
			'message' => $msg
		], $code);
	}
}
