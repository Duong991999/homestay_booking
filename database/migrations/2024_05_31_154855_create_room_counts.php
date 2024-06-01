<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCounts extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_counts', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('room_id')->index();
			$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
			$table->date('date');
			$table->unsignedInteger('count')->default(0);
			$table->timestamps();
		});

		Schema::table('booking_details', function (Blueprint $table) {
			$table->dropForeign(['category_id']);
			$table->dropColumn('category_id');
		});

		Schema::table('room_types', function (Blueprint $table) {
            $table->unsignedBigInteger('count')->default(0)->change();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_types', function (Blueprint $table) {
            $table->unsignedBigInteger('count')->default(null)->change();
        });
		Schema::table('booking_details', function (Blueprint $table) {
			$table->unsignedBigInteger('category_id')->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});
		Schema::dropIfExists('room_counts');
	}
}
