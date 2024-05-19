<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
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

Route::apiResource('bookables', 'Api\BookableController')->only(['index', 'show']);
Route::get('bookables/{bookable}/availability', 'Api\BookableAvailabilityController')
    ->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', 'Api\BookableReviewController')
    ->name('bookables.reviews.index');
Route::get('bookables/{bookable}/price', 'Api\BookablePriceController')
    ->name('bookables.price.show');

Route::get('/booking-by-review/{reviewKey}', 'Api\BookingByReviewController')
    ->name('booking.by-review.show');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'user']);

Route::apiResource('reviews', 'Api\ReviewController')->only(['show', 'store']);

Route::post('checkout', 'Api\CheckoutController')->name('checkout');

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('/list', [CategoryController::class, 'index']);
		Route::get('/show/{id}', [CategoryController::class, 'show']);
		
	});
});
