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
			$table->unsignedBigInteger('room_type_id')->index();
			$table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
			$table->date('date');
			$table->unsignedInteger('count')->default(0);
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
		Schema::dropIfExists('room_counts');
	}
}
