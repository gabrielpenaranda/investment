<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\InvestmentArchive;
use Illuminate\Http\Request;

class InvestmentArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(InvestmentArchive $investmentArchive)
    {
        return view('system.admin.investment_archives.show', compact('investmentArchive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvestmentArchive $investmentArchive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvestmentArchive $investmentArchive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvestmentArchive $investmentArchive)
    {
        //
    }
}
