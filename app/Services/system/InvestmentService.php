<?php

namespace App\Services\system;

use App\Models\system\Investment;
use App\Models\system\InvestmentChange;
use App\Models\system\Product;
use App\Models\system\Interest;
use App\Models\system\InterestMonth;
use App\Models\system\AccountStatement;
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

        if ($product->has_expiration) {
            $investment->closing_date = Carbon::parse($request['opening_date'])->addMonths($product->investment_time);
        }

        $investment->is_active = true;
        $investment->investment_amount = $request['investment_amount'];
        $investment ->initial_amount = $request['investment_amount'];
        $investment->activation_date = $request['activation_date'];
        $investment->serial = hash('md5', Hash::make(Carbon::now()));
        $investment->name = $user->name;
        $investment->email = $user-> email;
        $investment->user_id = $user->id;
        $investment->product_id = $product->id;
        $investment->capitalize = $request['capitalize'];

        $investment->save();

        $investment_change = new InvestmentChange();
        $investment_change->amount = $investment->investment_amount;
        $investment_change->activation_date = $investment->activation_date;
        $investment_change->rate = $product->annual_rate;
        $investment_change->year = (int)Carbon::parse($investment->activation_date)->format('Y');
        $investment_change->month = (int)Carbon::parse($investment->activation_date)->format('m');
        $investment_change->investment_id = $investment->id;

        $investment_change->save();

        $account_statement = new AccountStatement();
        $account_statement->date = Carbon::now();
        $account_statement->month = (int)Carbon::now()->format('m');
        $account_statement->year = (int)Carbon::now()->format('Y');
        $account_statement->description = 'Initial Investment';
        $account_statement->amount = $investment->investment_amount;
        $account_statement->balance = $investment->investment_amount;
        $account_statement->type = 'contribution';
        $account_statement->approved = true;
        $account_statement->investment_id = $investment->id;
        $account_statement->save();

        $log = new Log();
        $log->register($log, 'C', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been created succesfully'),
        ]);

        return;
    }

    public function updateInvestment($request, Investment $investment)
    {
        $subMonth = Carbon::now()->subMonth()->format('m');
        $interestMonth = InterestMonth::where('year', (int)Carbon::now()->format('Y'))->where('month', (int)$subMonth)->first();
        if (!$interestMonth->approved && $investment->investment_amount != $request['investment_amount']) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => __('swal.Cannot update'),
                'text' => __('swal.The investment cannot be updated because the interests for the previous month have not been approved'),
            ]);

            return redirect()->back();
        }


        $product = Product::where('id', $investment->product_id)->first();

        /* if ($product->has_expiration) {
            $investment->closing_date = Carbon::parse($request['opening_date'])->addMonths($product->investment_time);
        } */
        
        //if ($investment->investment_amount != $request['investment_amount'])
        if ($request['investment_amount'] != null)     {
            $oic = InvestmentChange::where('investment_id', $investment->id)->where('deactivation_date', null)->first();
            // dd($oic);
            if (Carbon::parse($oic->activation_date)->format('Y-m-d') == Carbon::now()->format('Y-m-d')) {
                $oic->delete();
            } else {
                $oic->deactivation_date = Carbon::now()->yesterday();
                $oic->update();
            }

            /* $old_investment_change->deactivation_date = Carbon::now();
            $old_investment_change->update(); */

            $investment_change = new InvestmentChange();
            $investment_change->amount = ($investment->investment_amount + $request['investment_amount']);
            $investment_change->activation_date = Carbon::now();
            $investment_change->rate = $product->annual_rate;
            $investment_change->year = (int)Carbon::parse($investment->activation_date)->format('Y');
            $investment_change->month = (int)Carbon::parse($investment->activation_date)->format('m');
            $investment_change->investment_id = $investment->id;
            $investment_change->save();

            $investment->is_active = true;

            $investment->investment_amount += $request['investment_amount'];

            $account_statement = new AccountStatement();
            $account_statement->date = Carbon::now();
            $account_statement->month = (int)Carbon::now()->format('m');
            $account_statement->year = (int)Carbon::now()->format('Y');
            $account_statement->description = 'Additional Contribution';
            $account_statement->amount = $request['investment_amount'];
            $account_statement->balance = $investment->investment_amount;
            $account_statement->type = 'contribution';
            $account_statement->approved = true;
            $account_statement->investment_id = $investment->id;
            $account_statement->save();
        }

        
        $investment->capitalize = $request['capitalize'];

        $investment->update();

        $log = new Log();
        $log->register($log, 'U', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->serial);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been updated succesfully'),
        ]);

        return;
    }

    public function deactivateInvestment(Investment $investment)
    {
        $investment->deactivation_date = Carbon::now();
        $investment->is_active = false;
        $investment->update();

        $log = new Log();
        $log->register($log, 'D', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->serial);session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been closed succesfully'),
        ]);

        return;

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been closed succesfully'),
        ]);

        return redirect()->back();
    }





    public function deactivateInvestmentX(Investment $investment)
    {

        $acum_interests = 0;
        $acum_days = 0;


        $month = now()->month;

        // filtra los cambios de inversion que se activaron en el mes actual
        $investment_changes = InvestmentChange::where('investment_id', $investment->id)->get();
        $investment_changes_filtered = $investment_changes->filter(function ($change) use ($month) {
            return $change->activation_date ? Carbon::parse($change->activation_date)->format('m') == $month : false;
        });

        foreach($investment_changes_filtered as $ic) {
            if (Carbon::parse($ic->activation_date)->format('m') == Carbon::now()->format('m')) {
                if ($ic->deactivation_date != null) {
                    $days = ceil(Carbon::parse($ic->activation_date)->diffInDays(Carbon::parse($ic->deactivation_date))) + 1;
                    dump($ic->amount);
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_days += $days;
                    $acum_interests += $interest;

                    $account_statement = new AccountStatement();
                    $account_statement->date = Carbon::now();
                    $account_statement->month = (int)Carbon::now()->format('m');
                    $account_statement->year = (int)Carbon::now()->format('Y');
                    $account_statement->description = $days.' days at '. $ic->rate.'% APY';
                    $account_statement->amount = $interest;
                    $account_statement->balance = ($ic->amount + $interest);
                    $account_statement->type = 'none';
                    $account_statement->approved = true;
                    $account_statement->investment_id = $investment->id;
                    $account_statement->save();
                } else {
                    $days = 30 - $acum_days;
                    $annual_interest = ($ic->amount * $ic->rate)/100;
                    $day_interest = $annual_interest / 360;
                    $interest = $day_interest * $days;
                    $acum_interests += $interest;
                    $ic->deactivation_date = Carbon::now()->endOfMonth();
                    $ic->update();

                    $account_statement = new AccountStatement();
                    $account_statement->date = Carbon::now();
                    $account_statement->month = (int)Carbon::now()->format('m');
                    $account_statement->year = (int)Carbon::now()->format('Y');
                    $account_statement->description = $days.' days at '. $ic->rate.'% APY';
                    $account_statement->amount = $interest;
                    $account_statement->balance = ($ic->amount + $interest);
                    $account_statement->type = 'none';
                    $account_statement->approved = true;
                    $account_statement->investment_id = $investment->id;
                    $account_statement->save();
                }
            }
        }

        $interest = new Interest();
        $interest->year = (int)Carbon::now()->format('Y');
        $interest->month = (int)Carbon::now()->format('m');
        $interest->serial = hash('md5', Hash::make($investment->serial.Carbon::now()));
        $interest->interest_amount = $acum_interests;
        $interest->investment_id = $investment->id;
        $interest->rate = $investment->product->annual_rate;
        $interest->name = $investment->name;
        $interest->email = $investment->email;
        $interest->approved = false;
        $interest->save();

        $log = new Log();
        $log->register($log, 'C', $interest->id, "interests", auth()->user()->name, auth()->user()->id, $interest->serial);

        $investment->deactivation_date = Carbon::now();
        $investment->is_active = false;
        $investment->update();

        $log = new Log();
        $log->register($log, 'D', $investment->id, "investments", auth()->user()->name, auth()->user()->id, $investment->serial);

        /* $investment_archive = new InvestmentArchive();
        $investment_archive->investment_amount = $investment->investment_amount;
        $investment_archive->name = $investment->name;
        $investment_archive->email = $investment->email;
        $investment_archive->product_name = $investment->product->name;
        $investment_archive->product_rate = $investment->product->annual_rate;
        $investment_archive->activation_date = $investment->activation_date;
        $investment_archive->deactivation_date = $investment->deactivation_date;
        $investment_archive->serial = $investment->serial;
        $investment_archive->save();

        $interests = Interest::where('investment_id', $investment->id)->get(); */

        /* foreach($interests as $i) {
            $interest_archive = new InterestArchive();
            $interest_archive->year = $i->year;
            $interest_archive->month = $i->month;
            $interest_archive->interest_amount = $i->interest_amount;
            $interest_archive->rate = $i->rate;
            $interest_archive->serial = $i->serial;
            $interest_archive->investment_archive_id = $investment_archive->id;
            $interest_archive->save();
            $i->delete();
        } */

        //$investment->delete();

        $account_statement = new AccountStatement();
        $account_statement->date = Carbon::now();
        $account_statement->month = (int)Carbon::now()->format('m');
        $account_statement->year = (int)Carbon::now()->format('Y');
        $account_statement->description = 'Investment Close - Final Balance';
        $account_statement->amount = $investment->investment_amount;
        $account_statement->balance = $investment->investment_amount;
        $account_statement->type = 'none';
        $account_statement->approved = true;
        $account_statement->investment_id = $investment->id;
        $account_statement->save();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The investment has been closed succesfully'),
        ]);

        return;
    }
}