<?php

namespace App\Services\system;

use App\Models\system\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class ReportService
{
    public function createReport($request)
    {
        $report = new Report();
        $report->name = $request['name'];
        $report->month = $request['month'];
        $report->year = $request['year'];
        $report->published = $request['published'];
        
        if ($request->hasFile('file')) {
            $route = Storage::put('reports', $request->file);
        }

        $report->route = $route;
        $report->save();

        // mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The report has been uploaded'),
        ]);

        return redirect()->back();
    }

    public function updateReport($request, $report)
    {
        $report->name = $request['name'];
        $report->month = $request['month'];
        $report->year = $request['year'];
        $report->published = $request['published'];
        
        $report->update();

        // mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The report data has been updated'),
        ]);

        return redirect()->back();
    }

    public function deleteReport(Report $report)
    {
        try {
            // elimina producto
            $route = $report->route;
            $report->delete();
            if (Storage::exists($route)) {
                Storage::delete($route);
            }

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
                    'text' => __('swal.Report cannot be deleted'),
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
