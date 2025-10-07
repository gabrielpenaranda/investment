<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create(['name' => 'Arizona', 'code' => 'AZ', 'country_id' => 1]);
        /* State::create(['name' => 'New Mexico', 'code' => 'NM', 'country_id' => 1]);
        State::create(['name' => 'California', 'code' => 'CA', 'country_id' => 1]);
        State::create(['name' => 'Texas', 'code' => 'TX', 'country_id' => 1]);
        State::create(['name' => 'New York', 'code' => 'NY', 'country_id' => 1]);
        State::create(['name' => 'Ontario', 'code' => 'ON', 'country_id' => 2]);
        State::create(['name' => 'Quebec', 'code' => 'QC', 'country_id' => 2]);
        State::create(['name' => 'British Columbia', 'code' => 'BC', 'country_id' => 2]);
        State::create(['name' => 'Jalisco', 'code' => 'JA', 'country_id' => 3]);
        State::create(['name' => 'Nuevo León', 'code' => 'NL', 'country_id' => 3]);
        State::create(['name' => 'Puebla', 'code' => 'PU', 'country_id' => 3]);
        State::create(['name' => 'England', 'code' => 'ENG', 'country_id' => 4]);
        State::create(['name' => 'Scotland', 'code' => 'SCT', 'country_id' => 4]);
        State::create(['name' => 'Wales', 'code' => 'WLS', 'country_id' => 4]);
        State::create(['name' => 'Bavaria', 'code' => 'BY', 'country_id' => 5]);
        State::create(['name' => 'Berlin', 'code' => 'BE', 'country_id' => 5]);
        State::create(['name' => 'Hamburg', 'code' => 'HH', 'country_id' => 5]);   */  
    }
}
