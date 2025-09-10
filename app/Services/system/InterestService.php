<?php

namespace App\Services\system;

use App\Models\system\Interest;
use App\Models\system\InterestArchive;
use App\Models\system\InterestMonth;
use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\system\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class InterestService
{
    public function generateInterests(InterestMonth $interestMonth)
    {
        $month = now()->subMonth()->month;
        $investments = Investment::all();
        $process_month = Carbon::now()->subMonth()->format('m');
        $process_year = Carbon::now()->subMonth()->format('Y');

        foreach($investments as $inv) {
            $investment_changes = InvestmentChange::where('investment_id', $inv->id)->where('month', $process_month)->get();
            $register_counter = $investment_changes->count();
            $acum_interests = 0;
            $acum_days = 0;
            $days = 0;
            $interest = 0;
            $annual_interest = 0;
            $day_interest = 0;

            foreach($investment_changes as $ic) {
                if ($ic->deactivation_date != null) {
                    $days = ceil(Carbon::parse($ic->activation_date)->diffInDays(Carbon::parse($ic->deactivation_date))) + 1;
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_days += $days;
                    $acum_interests += $interest;
                } else {
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
            $interest->interest_amount = round($acum_interests, 2);
            $interest->investment_id = $inv->id;
            $interest->rate = $inv->product->annual_rate;
            $interest->name = $inv->name;
            $interest->email = $inv->email;
            $interest->approved = false;
            if ($inv->capitalize) {
                $interest->condition = 'unpaid';
                $interest->status = 'cumulative';
            } else {
                $interest->condition = 'unpaid';
                $interest->status = 'payable';
            }
            $interest->save();

            if ($inv->capitalize) {
                $inv->investment_amount += $acum_interests;
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

        $interestMonth->processed = true;
        $interestMonth->update();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The interests has been generated succesfully'),
        ]);

        return redirect()->back();
    }

    public function approveInterests(InterestMonth $interestMonth)
    {
        $interests = Interest::where('year', $interestMonth->year)->where('month', $interestMonth->month)->get();
        
        foreach($interests as $interest) {
            $interest->approved = true;
            $interest->update();
        }

        $interestMonth->approved = true;
        $interestMonth->update();

        $newInterestMonth = new InterestMonth();
        $newInterestMonth->year = (string)Carbon::now()->format('Y');
        $newInterestMonth->month = (string)Carbon::now()->format('m');
        $newInterestMonth->processed = false;
        $newInterestMonth->approved = false;
        $newInterestMonth->save();  

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The interests has been approved succesfully'),
        ]);

        return redirect()->back();
    }   
}          