<?php

namespace App\Services\system;

use App\Models\system\Product;
use App\Models\system\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function createProduct($request)
    {
        $product = new Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->annual_rate = $request['annual_rate'];

        if ($request['has_expiration']) {
            $product->investment_time = $request['investment_time'];
            $product->has_expiration = $request['has_expiration'];
        } else {
            $product->has_expiration = false;
            $product->investment_time = 0;
        }

        $product->save();

        $log = new Log();
        $log->register($log, 'C', $product->id, "products", auth()->user()->name, auth()->user()->id, $product->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been created succesfully'),
        ]);
    }

    public function updateProduct($request, Product $product)
    {
        // dd($request);
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->annual_rate = $request['annual_rate'];
        
        if ($request['has_expiration']) {
            $product->investment_time = $request['investment_time'];
            $product->has_expiration = $request['has_expiration'];
        } else {
            $product->has_expiration = false;
            $product->investment_time = 0;
        }

        $product->update();
     
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been updated succesfully'),
        ]);
    }

    public function deleteProduct(Product $product)
    {
        try {
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
        }
    }


}
