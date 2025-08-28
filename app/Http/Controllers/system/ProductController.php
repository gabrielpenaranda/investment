<?php

namespace App\Http\Controllers\system;

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
        return view('system.admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:255',
            'annual_rate' => 'required|integer|between:0,100',
            'has_expiration' => 'boolean',
        ]);


        $product = Product::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('messages.Success!'),
            'text' => __('messages.The product has been created succesfully!'),
        ]);

        if ($product->has_expiration) {
            return redirect()->route('admin.products.edit', compact('product'));
        } else {
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
