<?php

namespace App\Services\system;

use App\Models\system\Product;
use App\Models\system\InvestmentChange;
use App\Models\system\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ProductService
{
    /**
     * Create a new class instance.
     */
    public function createProduct($request)
    {
        // Creación de producto
        $product = new Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->annual_rate = $request['annual_rate'];

        /* if ($request['has_expiration']) {
            $product->investment_time = $request['investment_time'];
            $product->has_expiration = $request['has_expiration'];
        } else {
            $product->has_expiration = false;
            $product->investment_time = 0;
        } */

        $product->save();

        // Agregar transacción al log
        $log = new Log();
        $log->register($log, 'C', $product->id, "products", auth()->user()->name, auth()->user()->id, $product->name);

        // mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been created succesfully'),
        ]);
    }

    public function updateProduct($request, Product $product)
    {
        // dd($request);
        /* 
        Si cambia el valor de annual_rate, crea nuevo registro en investment_changes y cierra el registro anterior.
        Si la fecha es la del mismo dia del registro anterior por otro cambio efectuado, se elimina el registro y se sustituye con el nuevo.
        */
        if ($product->annual_rate != $request['annual_rate']) {
            $investment_changes = InvestmentChange::where('deactivation_date', null)->where('rate', $product->annual_rate)->get();
            foreach($investment_changes as $ic) {
                $nic = new InvestmentChange();
                $nic->amount = $ic->amount;
                $nic->activation_date = Carbon::now();
                $nic->rate = $request['annual_rate'];
                $nic->interests = $ic->interests;
                $nic->investment_id = $ic->investment_id;
                $nic->save();

                if (Carbon::parse($ic->activation_date)->format('Y-m-d') == Carbon::now()->format('Y-m-d')) {
                    $ic->delete();
                } else {
                    $ic->deactivation_date = Carbon::now()->subDay();
                    $ic->total_days = (ceil(Carbon::parse($ic->activation_date)->diffInDays(Carbon::now()->subDay())));
                    $ic->update();
                }
            }
        }

        // Actualizacion de producto
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->annual_rate = $request['annual_rate'];
        
        /* if ($request['has_expiration']) {
            $product->investment_time = $request['investment_time'];
            $product->has_expiration = $request['has_expiration'];
        } else {
            $product->has_expiration = false;
            $product->investment_time = 0;
        } */

        $product->update();
     
        // Agregar transacción al log
        $log = new Log();
        $log->register($log, 'U', $product->id, "products", auth()->user()->name, auth()->user()->id, $product->name);
        
        // mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The product has been updated succesfully'),
        ]);
    }

    public function deleteProduct(Product $product)
    {
        try {
            // elimina producto
            $product->delete();

            // mensaje de exito
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
                    'title' => __('swal.Cannot delete'),
                    'text' => __('swal.Product cannot be deleted'),
                ]);
            } else {
                // mensaje de error
                Session::flash('swal', [
                    'icon' => 'error',
                    'title' => 'Error',
                    'text' => __('swal.An unexpected error occurred'),
                ]);
            }
        }
    }


}
