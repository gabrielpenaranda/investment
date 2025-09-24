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
            'description' => 'Regular investment',
            'annual_rate' => 7.00,
            'minimum_investment' => 1000.00,
        ]);

        Product::create([
            'name' => 'Extra Investment',
            'description' => 'Extra investment',
            'annual_rate' => 9.00,
            'minimum_investment' => 10000.00,
        ]);

        Product::create([
            'name' => 'Premium Investment',
            'description' => 'Premium investment',
            'annual_rate' => 11.00,
            'minimum_investment' => 100000.00,
        ]);

    }
}
