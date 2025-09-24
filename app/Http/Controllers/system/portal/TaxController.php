<?php

namespace App\Http\Controllers\system\portal;

use App\Http\Controllers\Controller;
use App\Models\system\Tax;
use Barryvdh\DomPDF\Facade\Pdf;

class TaxController extends Controller
{
    public function index()
    {
        return view('system.portal.taxes.index');
    }

    public function show(Tax $tax)
    {
        return view('system.portal.taxes.show', compact('tax'));
    }

    public function print(Tax $tax)
    {
        $data = [
            'tax' => $tax,
        ];
        
        return $pdf = Pdf::loadView('system.portal.taxes.print', $data)->stream('tax-form.pdf');
    }
}

