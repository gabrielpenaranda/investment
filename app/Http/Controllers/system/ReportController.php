<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Report;
use Illuminate\Http\Request;
use App\Http\Requests\system\ReportCreateRequest;
use App\Http\Requests\system\ReportUpdateRequest;
use App\Services\system\ReportService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.admin.reports.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system.admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportCreateRequest $request)
    {
        $this->reportService->createReport($request);
        return redirect()->route('admin.reports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('system.admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportUpdateRequest $request, Report $report)
    {
        $this->reportService->updateReport($request, $report);
        return redirect()->route('admin.reports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $this->reportService->deleteReport($report);
        return redirect()->route('admin.reports.index');
    }
}
