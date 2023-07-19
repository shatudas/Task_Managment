<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'Super Admin'	
        ]);

        Role::create([
        	'name' => 'Admin'	
        ]);

        Role::create([
        	'name' => 'Team Lider'	
        ]);

        Role::create([
        	'name' => 'Employer'	
        ]);

    }
}
