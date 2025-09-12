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
        $user4 = User::where('id', 5)->first();
        $user5 = User::where('id', 6)->first();
        $user6 = User::where('id', 7)->first();
        $user7 = User::where('id', 8)->first();


        // dd($user1->name);

        $investment1 = Investment::create([
            'investment_amount' => 10000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user1->id,
            'name' => $user1->name,
            'email' => $user1->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment2 = Investment::create([
            'investment_amount' => 20000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user2->id,
            'name' => $user2->name,
            'email' => $user2->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment3 = Investment::create([
            'investment_amount' => 20000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user3->id,
            'name' => $user3->name,
            'email' => $user3->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment4 = Investment::create([
            'investment_amount' => 40000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user4->id,
            'name' => $user4->name,
            'email' => $user4->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment5 = Investment::create([
            'investment_amount' => 50000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user5->id,
            'name' => $user5->name,
            'email' => $user5->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment6 = Investment::create([
            'investment_amount' => 60000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user6->id,
            'name' => $user6->name,
            'email' => $user6->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        $investment7 = Investment::create([
            'investment_amount' => 100000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'product_id' => 1,
            'user_id' => $user7->id,
            'name' => $user7->name,
            'email' => $user7->email,
            'is_active' => true,
            'serial' => hash('md5', Hash::make(Carbon::now())),
        ]);

        InvestmentChange::create([
            'amount' => $investment1->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment1->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment2->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment2->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment3->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment3->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment4->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment4->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment5->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment5->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment6->investment_amount,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment6->id,
        ]);

        InvestmentChange::create([
            'amount' => 70000,
            'activation_date' => Carbon::now()->subMonth()->startOfMonth(),
            'deactivation_date' => '2025-08-19',
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment7->id,
        ]);

        InvestmentChange::create([
            'amount' => $investment7->investment_amount,
            'activation_date' => '2025-08-20',
            'rate' => 7.00,
            'interests' => 0.00,
            'month' => Carbon::now()->subMonth()->format('m'),
            'year' => Carbon::now()->subMonth()->format('Y'),
            'investment_id' => $investment7->id,
        ]);

    }
}