<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\Investment;
use Carbon\Carbon;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Investment::create([
            'investment_amount' => 100000,
            'opening_date' => Carbon::now(),
            'closing_date' => now()->addYear(),
            'product_id' => 1,
            'user_id' => 2,
            'is_active' => true,
        ]);
    }
}
