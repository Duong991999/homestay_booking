<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homestays', function (Blueprint $table) {
            $table->string('city_name')->nullable();
            $table->string('ward_name')->nullable();
            $table->string('district_name')->nullable();
            $table->unsignedBigInteger('min_price')->nullable();
            $table->unsignedBigInteger('max_price')->nullable();
            $table->string('address')->nullable();
			$table->unsignedInteger('rating')->nullable()->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homestays', function (Blueprint $table) {
            $table->dropColumn(['city_name', 'ward_name', 'district_name', 'address', 'min_price', 'max_price']);
        });
    }
}
