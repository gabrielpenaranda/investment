<?php

namespace App\Services\system;

use App\Models\system\Interest;
use App\Models\system\InterestArchive;
use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\system\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class InterestService
{
    public function generateInterests()
    {
        $month = now()->subMonth()->month;
        $investments = Investment::where('is_active', true)->get();

        /* $investment_changes = InvestmentChange::all();
        $investment_changes_filtered = $investment_changes->filter(function ($change) use ($month) {
            return $change->activation_date ? Carbon::parse($change->activation_date)->subMonth()->format('m') == $month : false;
        }); */

        $process_month = Carbon::now()->subMonth()->format('m');
        $process_year = Carbon::now()->subMonth()->format('Y');

        foreach($investments as $inv) {
            $investment_changes = InvestmentChange::where('investment_id', $inv->id)->where('month', $process_month)->get();
            $register_counter = $investment_changes->count();
            // dd($register_counter);
            $acum_interests = 0;
            $acum_days = 0;
            $days = 0;
            $interest = 0;
            $annual_interest = 0;
            $day_interest = 0;

            foreach($investment_changes as $ic) {

                /*if ($register_counter == 1) {
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $acum_interests = $day_interest * 30;
                    dd(acum_interests);
                } else {
                    for($i = 1; $i <= $register_counter; $i++) {
                        $annual_interest = ($ic->amount * $ic->rate)/100;
                        $day_interest = $annual_interest / 360;
                        if ($i == $register_counter) {
                            $total_days = 30 - $acum-days;
                            $ic->total_days = $total_days;
                        }
                        $interests = $day_interest * $ic->total_days;
                        $ic->interests = interests;
                        if ($ic->deactivation_date == null) {
                            $ic->deactivation_date = Carbon::now()->subMonth()->endOfMonth();
                        }
                        $ic->update();
                        $acum_interests += $interests;
                        $acum_days += $ic->total_days;
                    }
                }*/
                
                if ($ic->deactivation_date != null) {
                    $days = ceil(Carbon::parse($ic->activation_date)->diffInDays(Carbon::parse($ic->deactivation_date))) + 1;
                    dump($ic->amount);
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_days += $days;
                    $acum_interests += $interest;
                } else {
                    dump($acum_interests);
                    $days = 30 - $acum_days;
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_interests += $interest;
                    $ic->deactivation_date = Carbon::now()->endOfMonth();
                    $ic->update();
                }

            }

            $interest = new Interest();
            $interest->month = (string)$process_month;
            $interest->year = (string)$process_year;
            $interest->serial = hash('md5', Hash::make($inv->serial.Carbon::now()));
            $interest->investment_amount = $inv->investment_amount;
            $interest->interest_amount = $acum_interests;
            $interest->investment_id = $inv->id;
            $interest->rate = $inv->product->annual_rate;
            $interest->days = 30;
            $interest->name = $inv->name;
            $interest->email = $inv->email;
            $interest->save();

            if ($inv->capitalize) {
                $inv->amount += $acum_interests;
                $inv->update();
            }

            $investment_change = new InvestmentChange();
            $investment_change->amount = $inv->investment_amount;
            $investment_change->activation_date = Carbon::now()->startOfMonth();
            $investment_change->rate = $inv->product->annual_rate;
            $investment_change->interests = 0.00;
            $investment_change->investment_id = $inv->id;    
            $investment_change->month = (string)Carbon::now()->format('m');
            $investment_change->year = (string)Carbon::now()->format('Y');
            $investment_change->save();

            $acum_interests = 0;
            $acum_days = 0;
            $days = 0;
            $interest = 0;
            $annual_interest = 0;
            $day_interest = 0;

            /*$log = new Log();
            $log->register($log, 'C', $interest->id, "interests", auth()->user()->name, auth()->user()->id, $interest->serial);*/
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The interests has been generated succesfully'),
        ]);

        return;
    }
}          