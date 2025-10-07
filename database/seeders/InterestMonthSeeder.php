<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\InterestMonth;

class InterestMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InterestMonth::create([
            'year' => 2024,
            'month' => 9,
            'processed' => 0,
            'approved' => 0,
        ]);
    }
}
