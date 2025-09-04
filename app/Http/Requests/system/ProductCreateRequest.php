<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|max:255',
            'annual_rate' => 'required|decimal:2|between:0,100',
            'has_expiration' => 'boolean',
        ];

        // Si tiene expiración, agregar investment_time como obligatorio
        if ($this->has_expiration) {
            $rules['investment_time'] = 'required|integer|between:12,60';
        }

        $this->has_expiration = 0;

        return $rules;
    }
}
