<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Admin',
        	'email' => 'admin@app.com',
        	'password' => Hash::make('password'),
            'role_id' =>1,
            'delatable' => 0,
            'status' => 0
        ]);
    }
}
