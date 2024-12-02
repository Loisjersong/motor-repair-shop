<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('products')->insert([
            // Engine Parts
            ['title' => 'Piston ring set', 'brand' => 'RIK', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Cylinder Head Gasket', 'brand' => 'CRP', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Lightened valve set', 'brand' => 'CRP', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Powercam s1', 'brand' => 'CRP', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Valves 5mm Stem', 'brand' => 'BWIN', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => '62mm forged piston kit', 'brand' => 'MTRT', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Manual tensioner', 'brand' => 'CRP', 'category_id' => 1, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Transmission Parts
            ['title' => 'Clutch spring', 'brand' => 'CRP', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Center spring', 'brand' => 'KESO', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Pulley Ramp', 'brand' => 'KESO', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Pulley kit', 'brand' => 'CRP', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Clutch Bell', 'brand' => '4S1M', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Pulley set version 2', 'brand' => 'CRP', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Torque gear', 'brand' => 'CRP', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Roller weights', 'brand' => 'CRP', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Roller weights', 'brand' => 'MTRT', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Street Flyball', 'brand' => 'MTRT', 'category_id' => 2, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Electrical
            ['title' => 'Starter motor', 'brand' => 'Bosch', 'category_id' => 3, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Ignition coil', 'brand' => 'Denso', 'category_id' => 3, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Wiring harness', 'brand' => 'Bosch', 'category_id' => 3, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Spark plug', 'brand' => 'NGK', 'category_id' => 3, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Braking System
            ['title' => 'Brake pad', 'brand' => 'Bendix', 'category_id' => 4, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Brake rotor', 'brand' => 'Brembo', 'category_id' => 4, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Brake fluid', 'brand' => 'Motul', 'category_id' => 4, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Suspension
            ['title' => 'Shock absorber', 'brand' => 'KYB', 'category_id' => 5, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Strut assembly', 'brand' => 'Monroe', 'category_id' => 5, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Fuel System
            ['title' => 'Fuel pump', 'brand' => 'Walbro', 'category_id' => 6, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Fuel injector', 'brand' => 'Bosch', 'category_id' => 6, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Body Parts
            ['title' => 'Bumper', 'brand' => 'OEM', 'category_id' => 7, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Wheels and Tires
            ['title' => 'Alloy wheels', 'brand' => 'Enkei', 'category_id' => 8, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Exhaust System
            ['title' => 'Muffler', 'brand' => 'HKS', 'category_id' => 9, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],

            // Cooling System
            ['title' => 'Radiator', 'brand' => 'Denso', 'category_id' => 10, 'in_stock' => 0, 'price' => 0, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
