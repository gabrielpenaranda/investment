<?php

namespace App\Http\Controllers\system\portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        return view('system.portal.taxes.index');
    }
}
