<?php

namespace App\Http\Controllers\system;

use App\Models\User;
use App\Models\system\State;
use App\Http\Controllers\Controller;
use App\Http\Requests\system\UserCreateRequest;
use App\Http\Requests\system\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Services\system\UserService;

class UserController extends Controller
{
    public UserService $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('system.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* $states = State::orderBy('country_id', 'asc')->get(); */
        $states = State::with('country')->get()->sortBy('country.name');
        return view ('system.admin.users.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $this->userService->storeUser($request);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('system.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $states = State::with('country')->get()->sortBy('country.name');
        return view ('system.admin.users.edit', compact('user', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userService->updateUser($request, $user);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return redirect()->route('admin.users.index');
    }
}
