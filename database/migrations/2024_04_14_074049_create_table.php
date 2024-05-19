<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homestays', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('city_code');
            $table->string('district_code');
            $table->string('ward_code');
            $table->timestamps();
        });
		Schema::create('room_types', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('homestay_id')->index();
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
            $table->string('name');
			$table->unsignedBigInteger('price')->default(0);
			$table->unsignedInteger('count');
            $table->timestamps();
        });
		Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('room_type_id')->index();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->string('name');
			$table->unsignedTinyInteger('status');
			$table->unsignedBigInteger('user_id')->index()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
		Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
		Schema::create('category_homestay', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('homestay_id')->index();
            $table->foreign('homestay_id')->references('id')->on('homestays')->onDelete('cascade');
			$table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
		Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('homstay_id')->index();
            $table->foreign('homstay_id')->references('id')->on('homestays')->onDelete('cascade');
			$table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger('employee_id')->index()->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
			$table->date('checkin_date');
			$table->date('checkout_date');
			$table->unsignedTinyInteger('status');
			$table->string('guest_name')->nullable();
			$table->string('phone_number')->nullable();
			$table->unsignedBigInteger('bill_value')->default(0);
            $table->timestamps();
        });
		Schema::create('booking_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('booking_id')->index();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
			$table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->unsignedInteger('count');
			$table->unsignedBigInteger('room_type_id')->index();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
			$table->json('room_id_list');
            $table->timestamps();
        });
		Schema::create('booking_detail_records', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('booking_detail_id')->index();
            $table->foreign('booking_detail_id')->references('id')->on('booking_details')->onDelete('cascade');
			$table->unsignedBigInteger('room_id')->index();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->timestamps();
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		$arrayTables = ['homestays', 'room_types', 'rooms', 'categories', 'category_homestay', 'bookings', 'booking_details', 'booking_detail_records'];
		foreach($arrayTables as $table){
			Schema::dropIfExists($table);
		}
    }
}
