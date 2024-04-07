<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate((['name' => 'admin']));
		$userRole = Role::firstOrCreate((['name' => 'user']));
		$companyRole = Role::firstOrCreate((['name' => 'company']));
    }
}
