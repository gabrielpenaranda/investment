<?php

namespace App\Http\Controllers\system\portal;

use App\Http\Controllers\Controller;
use App\Models\system\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.portal.investments.index');
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
    public function show(Investment $investment)
    {
        return view('system.portal.investments.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        //
    }
}
