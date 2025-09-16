<?php

namespace App\Services\system;

use App\Models\system\Interest;
use App\Models\system\InterestArchive;
use App\Models\system\InterestMonth;
use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\system\AccountStatement;
use App\Models\system\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class InterestService
{
    public function generateInterests(InterestMonth $interestMonth)
    {
        $month = now()->subMonth()->month;
        $investments = Investment::all();
        $process_month = (int)Carbon::now()->subMonth()->format('m');
        $process_year = (int)Carbon::now()->subMonth()->format('Y');

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
                    $ic->total_days = $days;
                    $ic->interests = round($interest, 2);
                    $ic->update();

                    $account_statement = new AccountStatement();
                    $account_statement->date = Carbon::now()->startOfMonth();
                    $account_statement->month = (int)Carbon::now()->subMonth()->format('m');
                    $account_statement->year = (int)Carbon::now()->subMonth()->format('Y');
                    $account_statement->description = $days.' days at '. $ic->rate.'% APY';
                    $account_statement->amount = $interest;
                    $account_statement->balance = ($ic->amount + $interest);
                    $account_statement->type = 'contribution';
                    $account_statement->approved = false;
                    $account_statement->investment_id = $ic->investment->id;
                    $account_statement->save();
                } else {
                    $days = 30 - $acum_days;
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_interests += $interest;
                    $ic->deactivation_date = Carbon::now()->subMonth()->endOfMonth();
                    $ic->total_days = $days;
                    $ic->interests = round($interest, 2);
                    $ic->update();

                    $account_statement = new AccountStatement();
                    $account_statement->date = Carbon::now()->startOfMonth();
                    $account_statement->month = (int)Carbon::now()->subMonth()->format('m');
                    $account_statement->year = (int)Carbon::now()->subMonth()->format('Y');
                    $account_statement->description = $days.' days at '. $ic->rate.'% APY';
                    $account_statement->amount = $interest;
                    $account_statement->balance = ($ic->amount + $interest);
                    $account_statement->type = 'contribution';
                    $account_statement->approved = false;
                    $account_statement->investment_id = $ic->investment->id;
                    $account_statement->save();
                }
            }

            $interest = new Interest();
            $interest->month = (int)$process_month;
            $interest->year = (int)$process_year;
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
            $investment_change->month = (int)Carbon::now()->format('m');
            $investment_change->year = (int)Carbon::now()->format('Y');
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

    public function rollbackInterests()
    {
        $lastInterestMonth = InterestMonth::where('processed', true)->where('approved', false)->orderBy('year', 'desc')->orderBy('month', 'desc')->first();

        if (!$lastInterestMonth) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => __('swal.Error'),
                'text' => __('swal.No unapproved processed interest month found to rollback.'),
            ]);
            return redirect()->back();
        }

        $interests = Interest::where('year', $lastInterestMonth->year)->where('month', $lastInterestMonth->month)->get();
        
        foreach($interests as $interest) {
            $investment = Investment::find($interest->investment_id);
            if ($interest->status == 'cumulative') {
                $investment->investment_amount -= $interest->interest_amount;
                $investment->update();
            }
            $interest->delete();
        }

        InvestmentChange::where('month', (int)Carbon::now()->format('m'))
            ->where('year', (int)Carbon::now()->format('Y'))
            ->delete();

        $lastInterestMonth->processed = false;
        $lastInterestMonth->update();

        $investmentChanges = InvestmentChange::where('year',(int)Carbon::now()->subMonth()->format('Y'))->where('month',(int)Carbon::now()->subMonth()->format('m'))->get();
        foreach($investmentChanges as $invCh) {
            //dd(Carbon::parse($invCh->deactivation_date)->format('Y-m-d'),Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'));
            if (Carbon::parse($invCh->deactivation_date)->format('Y-m-d') == Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d')) {
                $invCh->deactivation_date = null;
            }
            $invCh->total_days = 0;
            $invCh->interests = 0;
            $invCh->update();
        }

        $accountStatements = AccountStatement::where('year', $lastInterestMonth->year)
            ->where('month', $lastInterestMonth->month)
            ->where('approved', 'false')
            ->get();
        
        foreach($accountStatements as $statement) {
            $statement->delete();
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The interests have been rolled back successfully.'),
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
        $newInterestMonth->year = (int)Carbon::now()->format('Y');
        $newInterestMonth->month = (int)Carbon::now()->format('m');
        $newInterestMonth->processed = false;
        $newInterestMonth->approved = false;
        $newInterestMonth->save();


        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The interests has been approved succesfully'),
        ]);

        $accountStatements = AccountStatement::where('year', $interestMonth->year)
            ->where('month', $interestMonth->month)
            ->where('approved', false)
            ->get();

        foreach($accountStatements as $statement) {
            $statement->approved = true;
            $statement->update();
        }

        return redirect()->back();
    }

    public function payAllInterests()
    {
        $interests = Interest::where('approved', true)->where('status', 'payable')->where('condition', 'unpaid')->get();
        foreach($interests as $interest) {
            $interest->condition = 'paid';
            $interest->update();

            $account_statement = new AccountStatement();
            $account_statement->date = Carbon::now();
            $account_statement->month = (int)Carbon::now()->format('m');
            $account_statement->year = (int)Carbon::now()->format('Y');
            $account_statement->description = 'Investor Distribution';
            $account_statement->amount = $interest->interest_amount;
            $account_statement->balance = $interest->investment->investment_amount;
            $account_statement->type = 'distribution';
            $account_statement->approved = true;
            $account_statement->investment_id = $interest->investment->id;
            $account_statement->save();
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.All the payable interests has been marked as paid succesfully'),
        ]);

        return redirect()->back();
    }

    public function payInterest(Interest $interest)
    {
        $interest->condition = 'paid';
        $interest->update();

        $account_statement = new AccountStatement();
        $account_statement->date = Carbon::now();
        $account_statement->month = (int)Carbon::now()->format('m');
        $account_statement->year = (int)Carbon::now()->format('Y');
        $account_statement->description = 'Investor Distribution';
        $account_statement->amount = $interest->interest_amount;
        $account_statement->balance = $interest->investment->investment_amount;
        $account_statement->type = 'distribution';
        $account_statement->approved = true;
        $account_statement->investment_id = $interest->investment->id;
        $account_statement->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The payable interests has been marked as paid succesfully'),
        ]);

        return redirect()->back();
    }
}          