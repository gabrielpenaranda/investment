<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::create([
            'name' => 'Regular Investment',
            'description' => 'Regular investment with no time defined',
            'annual_rate' => 7.00,
        ]);

        Product::create([
            'name' => 'Extra Investment',
            'description' => 'Extra investment with no time defined',
            'annual_rate' => 9.00,
        ]);

        Product::create([
            'name' => 'Premium Investment',
            'description' => 'Premium investment with no time defined',
            'annual_rate' => 11.00,
        ]);

    }
}
