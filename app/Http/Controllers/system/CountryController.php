<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\Country;
use Illuminate\Http\Request;
use App\Services\system\CountryService;
use App\Http\Requests\system\CountryCreateRequest;
use App\Http\Requests\system\CountryUpdateRequest;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('system.admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryCreateRequest $request)
    {
        $this->countryService->createCountry($request);
        return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('system.admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryUpdateRequest $request, Country $country)
    {
        $this->countryService->updateCountry($request, $country);
        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $this->countryService->deleteCountry($country);
        return redirect()->route('admin.countries.index');
    }
}
