<?php

namespace App\Services\system;

use App\Models\User;
use App\Models\system\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\system\UserCredentialsMail;

class UserService
{
    public function storeUser($request)
    {
        /* $password = Str::password(12, true, true, false); */

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->zip_code = $request->input('zip_code');
        $user->social_security = $request->input('social_security');
        $user->fin = $request->input('fin');
        $user->type = $request->input('type');
        $user->state_id = $request->input('state_id');
        $user->password = Hash::make($request->input('password'));
        $user->generated_password = $request->input('password');
        $user->save();
        
        if ($user->type == 'Admin') {
            $user->assignRole('Administrator');
        } else {
            $user->assignRole('Associate');
        }

        // Mail::to($user->email)->send(new UserCredentialsMail($user, $password));

        $log = new Log();
        $log->register($log, 'C', $user->id, "users", auth()->user()->name, auth()->user()->id, $user->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The user has been created succesfully'),
        ]);

        return redirect()->back();
    }

    public function updateUser($request, User $user)
    {
        // dd($request->all(), $user);
        $user->name = $request->input('name');
        // $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->zip_code = $request->input('zip_code');
        $user->social_security = $request->input('social_security');
        $user->fin = $request->input('fin');
        $user->type = $request->input('type');
        $user->state_id = $request->input('state_id');
        $user->update();
        
        if ($user->type == 'Admin') {
            $user->assignRole('Administrator');
        } else {
            $user->assignRole('Associate');
        }

        $log = new Log();
        $log->register($log, 'U', $user->id, "users", auth()->user()->name, auth()->user()->id, $user->name);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => __('swal.Success'),
            'text' => __('swal.The user has been updated succesfully'),
        ]);

        return redirect()->back();
    }

    public function deleteUser(User $user)
    {
        try {
            // elimina producto
            $user->delete();

            $log = new Log();
            $log->register($log, 'D', $user->id, "users", auth()->user()->name, auth()->user()->id, $user->name);

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
                    'text' => __('swal.User cannot be deleted'),
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
