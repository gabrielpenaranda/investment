<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Interest;
use App\Models\system\InterestMonth;
use App\Models\system\InvestmentChange;
use App\Services\system\InterestService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InterestController extends Controller
{
    protected $interestService;

    public function __construct(InterestService $interestService)
    {
        $this->interestService = $interestService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interests = Interest::all();
        $interest_month = InterestMonth::where('year', Carbon::now()->format('Y'))->where('month', Carbon::now()->format('m'))->get();
        return view('system.admin.interests.index', compact('interests', 'interest_month'));
    }


    public function generate(InterestMonth $interestMonth)
    {
        $this->interestService->generateInterests($interestMonth);
        return redirect()->route('admin.interests.index');
    }

    public function approve(InterestMonth $interestMonth)
    {
        $this->interestService->approveInterests($interestMonth);
        return redirect()->route('admin.interests.index');
    }

    public function rollback()
    {
        $this->interestService->rollbackInterests();
        return redirect()->route('admin.interests.index');
    }

    public function payall()
    {
        $this->interestService->payAllInterests();
        return redirect()->route('admin.interests.index');
    }

    public function pay(Interest $interest)
    {
        $this->interestService->payInterest($interest);
        return redirect()->route('admin.interests.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Interest $interest)
    {
        $investmentChanges = InvestmentChange::where('investment_id', $interest->investment_id)
            ->where('month', $interest->month)
            ->where('year', $interest->year)
            ->get();
        return view('system.admin.interests.show', compact('interest','investmentChanges'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interest $interest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interest $interest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interest $interest)
    {
        //
    }
}
