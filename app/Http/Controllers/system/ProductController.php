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

        /* if ($request->has_expiration == "1") {
            $data = $request->validate([
                'name' => 'required|min:3|max:255',
                'description' => 'nullable|max:255',
                'annual_rate' => 'required|integer|between:0,100',
                'has_expiration' => 'boolean',
                'investment_time' => 'required|integer|between:12,60',
            ]);
        } else {
            $data = $request->validate([
                'name' => 'required|min:3|max:255',
                'description' => 'nullable|max:255',
                'annual_rate' => 'required|integer|between:0,100',
                'has_expiration' => 'boolean',
            ]);
        } */
        
       /*  Product::create($data);
     
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been created succesfully'),
        ]); */

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

        /* if ($request->has_expiration == "1") {
            $data = $request->validate([
                'name' => 'required|min:3|max:255',
                'description' => 'nullable|max:255',
                'annual_rate' => 'required|integer|between:0,100',
                'has_expiration' => 'boolean',
                'investment_time' => 'required|integer|between:12,60',
            ]);
        } else {
            $data = $request->validate([
                'name' => 'required|min:3|max:255',
                'description' => 'nullable|max:255',
                'annual_rate' => 'required|integer|between:0,100',
                'has_expiration' => 'boolean',
            ]);
        } */
        
       /*  $product->update($data);
     
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been updated succesfully'),
        ]); */

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $this->productService->deleteProduct($product);

        /* try {
            $product->delete();

            Session::flash('swal', [
                'icon' => 'success',
                'title' => '¡Éxito!',
                'text' => 'El producto se eliminó correctamente.',
            ]);

        } catch (QueryException $e) {
            // Verifica si el error es por restricción de clave foránea
            if ($e->getCode() === '23000') { // Código SQLSTATE para integridad referencial
                Session::flash('swal', [
                    'icon' => 'error',
                    'title' => 'No se puede eliminar',
                    'text' => 'Este producto no se puede eliminar porque está siendo usado en otras partes del sistema (por ejemplo, inversiones).',
                ]);
            } else {
                Session::flash('swal', [
                    'icon' => 'error',
                    'title' => 'Error',
                    'text' => 'Ocurrió un error inesperado.',
                ]);
            }
        } */

        return redirect()->route('admin.products.index');
    }
}
