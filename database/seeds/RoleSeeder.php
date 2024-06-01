<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
	const ROLE_LIST = ['admin', 'user', 'company'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		foreach(self::ROLE_LIST as $role){
			Role::firstOrCreate((['name' => $role]));
		}
    }
}
