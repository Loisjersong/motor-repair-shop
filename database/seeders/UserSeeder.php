<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'role_id' => 1, // Assuming 1 is the ID for admin role
            'email' => 'admin@test.com',
            'phone' => '1234567890',
            'password' => Hash::make('test1234'),
            'date_of_birth' => '1980-01-01',
            'avatar' => null,
            'email_verified_at' => now(),
        ]);

        // Create a customer user
        User::create([
            'first_name' => 'Customer',
            'last_name' => 'User',
            'role_id' => 2, // Assuming 2 is the ID for customer role
            'email' => 'customer@test.com',
            'phone' => '0987654321',
            'password' => Hash::make('test1234'),
            'date_of_birth' => '1990-01-01',
            'avatar' => null,
            'email_verified_at' => now(),
        ]);
    }
}
