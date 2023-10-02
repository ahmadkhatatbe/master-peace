<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        // Define admin data to be inserted
        $adminData = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                // Hash the password
            ],
            // Add more admin data as needed
        ];

        // Insert the admin data into the 'admin' table
        DB::table('admins')->insert($adminData);
    }
}