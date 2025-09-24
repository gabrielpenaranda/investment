<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
         if (auth()->user() && auth()->user()->type === 'Admin') {
            return true;
        } else {
            return false;
        };
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            'type' => 'required|string|in:Admin,Person,Company',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'fin' => 'nullable|string|min:12|max:12|unique:users,fin',
            'social_security' => 'nullable|string|min:9|max:9|unique:users,social_security',
            'state_id' => 'required|exists:states,id',
            'phone' => 'nullable|string|max:20',
        ];
    }
}
