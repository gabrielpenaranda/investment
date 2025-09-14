<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\system\State;
use App\Models\system\Country;
use App\Http\Requests\system\StateCreateRequest;
use App\Http\Requests\system\StateUpdateRequest;
use App\Services\system\StateService;

class StateController extends Controller
{
    protected $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.admin.states.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('system.admin.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StateCreateRequest $request)
    {
        $this->stateService->createState($request);
        return redirect()->route('admin.states.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('system.admin.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $this->stateService->updateState($request, $state);
        return redirect()->route('admin.states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $this->stateService->deleteState($state);
        return redirect()->route('admin.states.index');
    }
}
