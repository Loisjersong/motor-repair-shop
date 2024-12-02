<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('categories')->insert([
            ['name' => 'Engine Parts', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Transmission Parts', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Electrical', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Braking System', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Suspension', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fuel System', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Body Parts', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wheels and Tires', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lubricants', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cleaning Products', 'created_at' => $now, 'updated_at' => $now],
        ]);

    }
}
