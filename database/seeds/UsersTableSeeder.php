<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'username' => 'superadmin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'pemksmsuperadmin@mailinator.com',
            'password' => 'pemksmsuperadmin',
            'role' => 'superadmin'
        ];

        Sentinel::register($credentials);
    }
}
