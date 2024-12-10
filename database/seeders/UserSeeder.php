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

    // Define lists of first and last names
    $firstNames = ['John', 'Jane', 'Mary', 'James', 'Robert', 'Patricia', 'Michael', 'Linda', 'David', 'Barbara', 'Elizabeth', 'William', 'Joseph', 'Charles', 'Thomas'];
    $lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas', 'Jackson', 'White', 'Harris'];

    // Create 15 more customer users
    for ($i = 1; $i <= 15; $i++) {
        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[array_rand($lastNames)];
        $email = strtolower($firstName) . '.' . strtolower($lastName) . $i . '@example.com'; // Generate a unique email

        User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'role_id' => 2, // Assuming 2 is the ID for customer role
            'email' => $email, // Unique email
            'phone' => '+639' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT), // Random Philippine phone number
            'password' => Hash::make('test1234'),
            'date_of_birth' => now()->subYears(rand(18, 50))->format('Y-m-d'), // Random age between 18-50
            'avatar' => null,
            'email_verified_at' => now(),
        ]);
    }
}

}
