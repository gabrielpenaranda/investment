<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user1 = User::where('id', 2)->first();
        $user2 = User::where('id', 3)->first();
        $user3 = User::where('id', 4)->first();

        // dd($user1->name);

        $investment1 = Investment::create([
            'investment_amount' => 100000,
            'opening_date' => Carbon::now(),
            'activation_date' => Carbon::now(),
            'product_id' => 2,
            'user_id' => 2,
            'name' => $user1->name,
            'email' => $user1->email,
            'is_active' => true,
            'closing_date' => Carbon::now()->addMonths(48),
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment2 = Investment::create([
            'investment_amount' => 1000000,
            'opening_date' => Carbon::now(),
            'activation_date' => Carbon::now(),
            'product_id' => 1,
            'user_id' => 3,
            'name' => $user2->name,
            'email' => $user2->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment3 = Investment::create([
            'investment_amount' => 1000000,
            'opening_date' => Carbon::now(),
            'activation_date' => Carbon::now(),
            'product_id' => 1,
            'user_id' => 4,
            'name' => $user3->name,
            'email' => $user3->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        InvestmentChange::create([
            'amount' => $investment1->investment_amount,
            'activation_date' => Carbon::now(),
            'rate' => 5.00,
            'interests' => 0.00,
            'investment_id' => $investment1->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment2->investment_amount,
            'activation_date' => Carbon::now(),
            'rate' => 5.00,
            'interests' => 0.00,
            'investment_id' => $investment2->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment3->investment_amount,
            'activation_date' => Carbon::now(),
            'rate' => 5.00,
            'interests' => 0.00,
            'investment_id' => $investment3->id,
        ]);

    }
}
