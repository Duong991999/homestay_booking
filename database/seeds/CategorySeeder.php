<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::firstOrCreate(([
			'name' => 'Du lịch'
		]));
		Category::firstOrCreate(([
			'name' => 'Thiên nhiên'
		]));
		Category::firstOrCreate(([
			'name' => 'Chữa lành'
		]));
		Category::firstOrCreate(([
			'name' => 'Miền núi'
		]));
		Category::firstOrCreate(([
			'name' => 'Cao cấp'
		]));
		Category::firstOrCreate(([
			'name' => 'Chữa lành'
		]));
		Category::firstOrCreate(([
			'name' => 'Thư giãn'
		]));

	}
}
