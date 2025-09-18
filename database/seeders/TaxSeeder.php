<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\Tax;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tax::create([
            'year' => 2024,
            'earnings' => 654.00,
            'user_id' => 2,
        ]);

        Tax::create([
            'year' => 2024,
            'earnings' => 971.00,
            'user_id' => 3,
        ]);

        Tax::create([
            'year' => 2024,
            'earnings' => 1398.00,
            'user_id' => 4,
        ]);

        Tax::create([
            'year' => 2024,
            'earnings' => 5623.00,
            'user_id' => 5,
        ]);

        Tax::create([
            'year' => 2024,
            'earnings' => 890.00,
            'user_id' => 6,
        ]);

        Tax::create([
            'year' => 2024,
            'earnings' => 14340.00,
            'user_id' => 7,
        ]);
    }
}
