<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Tax;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.admin.taxes.index');
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
    public function show(Tax $tax)
    {
        return view('system.admin.taxes.show', compact('tax'));
    }

    public function print(Tax $tax)
    {
        $data = [
            'tax' => $tax,
        ];
        return $pdf = Pdf::loadView('system.portal.taxes.print', $data)->stream('tax-form.pdf');
    }
    
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
