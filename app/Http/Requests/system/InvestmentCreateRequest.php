<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentCreateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'investment_amount' => 'decimal:2|required|between:1000,100000000000',
            'opening_date' => 'date|required|after_or_equal:today|before_or_equal:'.today()->endOfMonth()->format('Y-m-d'),
            /* 'is_active' => 'boolean', */
        ];
    }
}
