<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
         if (auth()->user()) {
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
            'name' => [
                'string',
                'required',
                'min:3',
                'max:100',
                // Use Rule::unique to specify the ignored ID
                Rule::unique('countries', 'name')->ignore($this->country->id),
            ],
            'code' => [
                'string',
                'required',
                'max:3',
                // Use Rule::unique to specify the ignored ID
                Rule::unique('countries', 'code')->ignore($this->country->id),
            ],
        ];
    }
}
