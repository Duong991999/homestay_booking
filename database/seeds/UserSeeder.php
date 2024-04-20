<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$admin = User::create([
			'id' => 1,
			'name' => 'admin',
			'email' => "admin@booking.com",
            'password' => Hash::make("123456"),
		]);
		$admin->assignRole('admin');

		$user = User::create([
			'id' => 2,
			'name' => 'User 1',
			'email' => "user1@booking.com",
            'password' => Hash::make("123456"),
		]);
		$user->assignRole('user');
		$user = User::create([
			'id' => 3,
			'name' => 'User 2',
			'email' => "user2@booking.com",
            'password' => Hash::make("123456"),
		]);
		$user->assignRole('user');


		$company = User::create([
			'id' => 4,
			'name' => 'Company 1',
			'email' => "company1@booking.com",
            'password' => Hash::make("123456"),
		]);
		$company->assignRole('company');

		$company = User::create([
			'id' => 5,
			'name' => 'Company 2',
			'email' => "company2@booking.com",
            'password' => Hash::make("123456"),
		]);
		$company->assignRole('company');

		$company = User::create([
			'id' => 6,
			'name' => 'Employee 1',
			'email' => "employee1@booking.com",
            'password' => Hash::make("123456"),
		]);
		$company->assignRole('employee');

		$company = User::create([
			'id' => 7,
			'name' => 'Employee 2',
			'email' => "employee2@booking.com",
            'password' => Hash::make("123456"),
		]);
		$company->assignRole('employee');
    }
}
