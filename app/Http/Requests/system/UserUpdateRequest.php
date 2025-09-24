<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            /* 'email' => ['required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique('users', 'email')->ignore($this->user->id),
                    ], */
            'type' => 'required|string|in:Admin,Person,Company',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'fin' => [ 'nullable','string','min:12','max:12', Rule::unique('users', 'fin')->ignore($this->user->id)],
            'social_security' => ['nullable','string', 'min:9', 'max:9', Rule::unique('users', 'social_security')->ignore($this->user->id)],
            'state_id' => 'required|exists:states,id',
            'phone' => 'nullable|string|max:20',
        ];


    }
}
