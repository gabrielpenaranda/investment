<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Interest;
use App\Models\system\InterestMonth;
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


    public function generate()
    {
        $this->interestService->generateInterests();

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
        //
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
