<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Product;
use Illuminate\Http\Request;

use App\Services\system\ProductService;
use App\Http\Requests\system\ProductCreateRequest;
use App\Http\Requests\system\ProductUpdateRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

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
    public function store(ProductCreateRequest $request)
    {
        $this->productService->createProduct($request);
        return redirect()->route('admin.products.index');
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
        return view('system.admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->productService->updateProduct($request, $product);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $this->productService->deleteProduct($product);
        return redirect()->route('admin.products.index');
    }
}
