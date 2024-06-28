<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropReviews extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('reviews');
		Schema::create('reviews', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->unsignedInteger('rating');
			$table->text('content');
			$table->unsignedBigInteger('homestay_id')->index()->nullable();
			$table->foreign('homestay_id')->references('id')->on('homestays');
			$table->unsignedBigInteger('booking_id')->index()->nullable();
			$table->foreign('booking_id')->references('id')->on('bookings');
			$table->unsignedBigInteger('user_id')->index()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::table('homestays', function (Blueprint $table) {
			$table->decimal('rating', 5, 4)->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reviews');
		Schema::create('reviews', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->timestamps();
			$table->unsignedInteger('rating');
			$table->text('content');
			$table->unsignedBigInteger('homestay_id')->index()->nullable();
			$table->foreign('homestay_id')->references('id')->on('homestays');
			$table->unsignedBigInteger('booking_id')->index()->nullable();
			$table->foreign('booking_id')->references('id')->on('bookings');
			$table->unsignedBigInteger('user_id')->index();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}
}
