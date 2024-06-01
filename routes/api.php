<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HomestayController;
use App\Http\Controllers\Api\RoomTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource('bookables', 'Api\BookableController')->only(['index', 'show']);
// Route::get('bookables/{bookable}/availability', 'Api\BookableAvailabilityController')
//     ->name('bookables.availability.show');
// Route::get('bookables/{bookable}/reviews', 'Api\BookableReviewController')
//     ->name('bookables.reviews.index');
// Route::get('bookables/{bookable}/price', 'Api\BookablePriceController')
//     ->name('bookables.price.show');

// Route::get('/booking-by-review/{reviewKey}', 'Api\BookingByReviewController')
//     ->name('booking.by-review.show');

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/user', [AuthController::class, 'user']);

// Route::apiResource('reviews', 'Api\ReviewController')->only(['show', 'store']);

// Route::post('checkout', 'Api\CheckoutController')->name('checkout');

Route::group(['prefix' => 'auth'], function(){
	Route::post('/register', [AuthController::class, 'register']);
	Route::post('/login', [AuthController::class, 'login']);
	Route::get('/me', [AuthController::class, 'user']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('/index', [CategoryController::class, 'index']);
		Route::get('/show/{id}', [CategoryController::class, 'show']);
		Route::post('/store', [CategoryController::class, 'store']);
		Route::post('/update/{id}', [CategoryController::class, 'update']);
		Route::post('/delete', [CategoryController::class, 'delete']);
	});
});

Route::group(['prefix' => 'homestay',], function(){
	Route::post('/store', [HomestayController::class, 'store']);
	Route::get('/show/{id}', [HomestayController::class, 'show']);
	Route::get('/index', [HomestayController::class, 'index']);
	Route::post('/update/{id}', [HomestayController::class, 'update']);
	Route::post('/delete', [HomestayController::class, 'delete']);
});

Route::group(['prefix' => 'room-type',], function(){
	Route::post('/store', [RoomTypeController::class, 'store']);
	Route::get('/show/{id}', [RoomTypeController::class, 'show']);
	Route::get('/index', [RoomTypeController::class, 'myRoomType']);
	Route::post('/update/{id}', [RoomTypeController::class, 'update']);
	Route::post('/delete', [RoomTypeController::class, 'delete']);
});
