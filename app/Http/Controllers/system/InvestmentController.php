<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Investment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\system\Product;
use App\Http\Requests\system\InvestmentCreateRequest;
use App\Http\Requests\system\InvestmentUpdateRequest;
use App\Services\system\InvestmentService;

class InvestmentController extends Controller
{
    protected $investmentService;
    /**
     * Create a new class instance.
     */
    public function __construct(InvestmentService $investmentService)
    {
        $this->investmentService = $investmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.admin.investments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('type', 'Person')->orWhere('type', 'Company')->get();
        $products = Product::all();
        return view('system.admin.investments.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestmentCreateRequest $request)
    {
        $this->investmentService->createInvestment($request);
        return redirect()->route('admin.investments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        return view('system.admin.investments.edit', compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvestmentUpdateRequest $request, Investment $investment)
    {

        $this->investmentService->updateInvestment($request, $investment);
        return redirect()->route('admin.investments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $this->investmentService->deactivateInvestment($investment);
        return redirect()->route('admin.investments.index');
    }
}
