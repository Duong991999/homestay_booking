<?php

use App\Homestay;
use Illuminate\Database\Seeder;

class HomestaySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Homestay::firstOrCreate(([
			'user_id' => 4,
			'city_code' => '01',
			'district_code' => '001',
			'ward_code' => '00004'
		]));
		Homestay::firstOrCreate(([
			'user_id' => 5,
			'city_code' => '01',
			'district_code' => '001',
			'ward_code' => '00006'
		]));
	}
}
