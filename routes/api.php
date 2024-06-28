<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HomestayController;
use App\Http\Controllers\Api\RoomTypeController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ReviewController;
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
	Route::post('/logout', [AuthController::class, 'logout']);
	Route::get('/me', [AuthController::class, 'user']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin|company'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('/index', [CategoryController::class, 'index']);
		Route::get('/all', [CategoryController::class, 'all']);
		Route::get('/show/{id}', [CategoryController::class, 'show']);
		Route::post('/store', [CategoryController::class, 'store'])->middleware('role:admin');
		Route::post('/update/{id}', [CategoryController::class, 'update'])->middleware('role:admin');
		Route::post('/delete', [CategoryController::class, 'delete'])->middleware('role:admin');
	});
});

Route::group(['prefix' => 'homestay',], function(){
	Route::post('/store', [HomestayController::class, 'store']);
	Route::get('/show/{id}', [HomestayController::class, 'show']);
	Route::get('/show-detail/{id}', [HomestayController::class, 'showDetail']);
	Route::get('/index', [HomestayController::class, 'index']);
	Route::get('/search', [HomestayController::class, 'paginateSearch']);
	Route::post('/update/{id}', [HomestayController::class, 'update']);
	Route::post('/delete', [HomestayController::class, 'delete']);
	Route::get('/status/{id}', [RoomController::class, 'status']);
});

Route::group(['prefix' => 'room-type',], function(){
	Route::post('/store', [RoomTypeController::class, 'store']);
	Route::get('/show/{id}', [RoomTypeController::class, 'show']);
	Route::get('/index', [RoomTypeController::class, 'myRoomType']);
	Route::post('/update/{id}', [RoomTypeController::class, 'update']);
	Route::post('/delete', [RoomTypeController::class, 'delete']);
});

Route::group(['prefix' => 'room',], function(){
	Route::post('/store', [RoomController::class, 'store']);
	Route::get('/show/{id}', [RoomController::class, 'show']);
	Route::get('/index/{id}', [RoomController::class, 'myRoom']);
	Route::get('/all/{id}', [RoomController::class, 'all']);
	Route::post('/update/{id}', [RoomController::class, 'update']);
	Route::post('/delete', [RoomController::class, 'delete']);
});

Route::group(['prefix' => 'booking',], function(){
	Route::post('/store', [BookingController::class, 'store']);
	Route::get('/show/{id}', [BookingController::class, 'show']);
	Route::get('/index/{id}', [BookingController::class, 'index']);
	Route::get('/all/{id}', [BookingController::class, 'all']);
	Route::post('/update/{id}', [BookingController::class, 'update']);
	Route::post('/delete', [BookingController::class, 'delete']);
	Route::get('/room-assign/{id}', [BookingController::class, 'assign']);
	Route::post('/change-status/{id}', [BookingController::class, 'changeStatus']);
	Route::get('/user-search', [BookingController::class, 'paginateUserSearch']);
	Route::get('/company-search', [BookingController::class, 'paginateCompanySearch']);
});

Route::group(['prefix' => 'review',], function(){
	Route::post('/store', [ReviewController::class, 'store']);
	Route::get('/paginate/{id}', [ReviewController::class, 'paginate']);
});
