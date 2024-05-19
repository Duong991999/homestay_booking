<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
			'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken(env('APP_TOKEN'))->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];

		return $this->success($data);
    }

    public function login(LoginRequest $request) {
        // dd(env("APP_TOKEN"));
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return $this->error("Email hoac mat khau ko dung!", Response::HTTP_UNAUTHORIZED);
        }
        $token = $user->createToken(env("APP_TOKEN"))->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token
        ];

		return $this->success($data);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

	public function user(){
		return auth()->user();
	}
}