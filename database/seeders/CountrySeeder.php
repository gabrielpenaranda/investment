<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create(['name' => 'United States', 'code' => 'USA']);
        /* Country::create(['name' => 'Canada', 'code' => 'CAN']);
        Country::create(['name' => 'Mexico', 'code' => 'MEX']);
        Country::create(['name' => 'United Kingdom', 'code' => 'GBR']);
        Country::create(['name' => 'Germany', 'code' => 'DEU']); */
    }
}
