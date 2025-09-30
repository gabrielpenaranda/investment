<?php

namespace App\Http\Controllers\system\portal;

use App\Http\Controllers\Controller;
use App\Models\system\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.portal.products.index');
    }

}
