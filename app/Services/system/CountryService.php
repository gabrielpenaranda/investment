<?php

namespace App\Services\system;

use App\Models\system\Country;
use App\Models\system\Log;
use Illuminate\Support\Facades\Session;

class CountryService
{
    public function createCountry($request)
    {
        $country = new Country();
        $country->name = $request['name'];
        $country->code = $request['code'];
        $country->save();

        $log = new Log();
        $log->register($log, 'C', $country->id, "countries", auth()->user()->name, auth()->user()->id, $country->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The country has been created succesfully'),
        ]);

        return redirect()->back();
    }

    public function updateCountry($request, Country $country)
    {
        $country->name = $request['name'];
        $country->code = $request['code'];
        $country->update();

        $log = new Log();
        $log->register($log, 'U', $country->id, "countries", auth()->user()->name, auth()->user()->id, $country->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The country has been updated succesfully'),
        ]);

        return redirect()->back();
    }

    public function deleteCountry(Country $country)
    {
        try {
            // elimina producto
            $country->delete();

            // mensaje de exito
            Session::flash('swal', [
                'icon' => 'success',
                'title' => __('swal.deleted_title'),
                'text' => __('swal.deleted_text'),
            ]);

        } catch (QueryException $e) {
            // Verifica si el error es por restricción de clave foránea
            if ($e->getCode() === '23000') { // Código SQLSTATE para integridad referencial
                Session::flash('swal', [
                    'icon' => 'error',
                    'title' => __('swal.Cannot delete'),
                    'text' => __('swal.Country cannot be deleted'),
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
