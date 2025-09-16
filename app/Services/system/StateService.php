<?php

namespace App\Services\system;

use App\Models\system\State;
use App\Models\system\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class StateService
{
    public function createState($request)
    {
        $state = new state();
        $state->name = ucwords($request['name']);
        $state->code = strtoupper($request['code']);
        $state->country_id = $request['country_id'];
        $state->save();

        $log = new Log();
        $log->register($log, 'C', $state->id, "countries", auth()->user()->name, auth()->user()->id, $state->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The state has been created succesfully'),
        ]);

        return redirect()->back();
    }

    public function updateState($request, State $state)
    {
        $state->name = ucwords($request['name']);
        $state->code = strtoupper($request['code']);
        $state->country_id = $request['country_id'];
        $state->update();

        $log = new Log();
        $log->register($log, 'U', $state->id, "countries", auth()->user()->name, auth()->user()->id, $state->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The state has been updated succesfully'),
        ]);

        return redirect()->back();
    }

    public function deleteState(State $state)
    {
        try {
            // elimina producto
            $state->delete();

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
                    'text' => __('swal.state cannot be deleted'),
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

        return redirect()->back();
    }
}
