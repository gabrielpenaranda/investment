<?php

namespace App\Services\system;

use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\system\Product;
use App\Models\system\Interest;
use App\Models\system\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class InvestmentService
{
    public function createInvestment($request)
    {
        $user = User::where('id', $request['user_id'])->first();
        $product = Product::where('id', $request['product_id'])->first();
        
        $investment = new Investment();

        /* if ($request['is_active'])
        {
            $investment->activation_date = Carbon::now();
        } */

        if ($product->has_expiration) {
            $investment->closing_date = Carbon::parse($request['opening_date'])->addMonths($product->investment_time);
        }

        // $investment->is_active = $request['is_active'];
        $investment->activation_date = Carbon::now();
        $investment->is_active = true;
        $investment->investment_amount = $request['investment_amount'];
        $investment->opening_date = $request['opening_date'];
        $investment->serial = hash('md5', Hash::make(Carbon::now()));
        $investment->name = $user->name;
        $investment->email = $user-> email;
        $investment->user_id = $user->id;
        $investment->product_id =$product->id;

        $investment->save();

        $investment_change = new InvestmentChange();
        $investment_change->amount = $investment->investment_amount;
        $investment_change->activation_date = $investment->opening_date;
        $investment_change->rate = $product->annual_rate;
        $investment_change->interests = 0;

        $investment_change->save();

        $log = new Log();
        $log->register($log, 'C', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been created succesfully'),
        ]);
    }

    public function updateInvestment($request, Investment $investment)
    {
        // dd($request);
        $product = Product::where('id', $investment->product_id)->first();

        if ($product->has_expiration) {
            $investment->closing_date = Carbon::parse($request['opening_date'])->addMonths($product->investment_time);
        }
        
        if ($investment->investment_amount != $request['investment_amount']) {

            $old_investment_change = InvestmentChange::where('id', $investment->id)->where('deactivation_date', null)->first();
            $old_investment_change->deactivation_date = Carbon::now();
            $old_investment_change->update();

            $investment_change = new InvestmentChange();
            $investment_change->amount = $request['investment_amount'];
            $investment_change->activation_date = $investment->opening_date;
            $investment_change->rate = $product->annual_rate;
            $investment_change->interests = 0;
            $investment_change->investment_id = $investment->id;
            $investment_change->save();
        }

         /* if (!$investment->is_active && $request['is_active'])
        {
            $investment->activation_date = Carbon::now();
        } */

        $investment->is_active = true;
        $investment->investment_amount = $request['investment_amount'];

        $investment->update();

        $log = new Log();
        $log->register($log, 'U', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->serial);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been updated succesfully'),
        ]);
    }

    public function deactivateInvestment(Investment $investment)
    {
        $investment->is_active = false;
        $investment->update();

        $investment_change = InvestmentChange::where('id', $investment->id)->where('deactivation_date', null)->first();
        $investment_change->deactivation_date = Carbon::now();
        $investment_change->update();

        $acum_interests = 0;

        $investment_changes = InvestmentChange::where('id', $investment->id)->get();

        foreach($investment_changes as $ic) {
            if (Carbon::parse($ic->activation_date)->format('m') == Carbon::now()->format('m')) {
                $annual_interest = ($ic->amount * $ic->rate)/100;
                $day_interest = $annual_interest / 360;
                $active_days_interest = (Carbon::parse($ic->deactivation_date)->diffInDays(Carbon::parse($ic->deactivation_date))) * $day_interest;
                $acum_interests += $active_days_interest;
            }
        }

        $interest = new Interest();
        $interest->year = Carbon::now()->format('Y');
        $interest->month = Carbon::now()->format('m');
        $interest->serial = hash('md5', Hash::make($investment->serial.Carbon::now()));
        $interest->amount = $investment->investment_amount;
        $interest->investment_id = $investment->id;
        $interest->rate = $investment->product->annual_rate;
        $interest->save();

        $log = new Log();
        $log->register($log, 'C', $interest->id, "interests", auth()->user()->name, auth()->user()->id, $interest->serial);

        $investment->is_active = false;
        $investment->update();

        $log = new Log();
        $log->register($log, 'D', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->serial);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been closed succesfully'),
        ]);

    }
}
