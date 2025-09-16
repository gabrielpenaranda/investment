<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentUpdateRequest extends FormRequest
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
            /* 'investment_amount' => 'decimal:2|required|between:1000,100000000000', */
            /* $this->filled('amount') && $this->amount != $investment->amount
                    ? 'decimal:2|required|between:1000,100000000000'
                    : 'nullable', */
            'investment_amount' => 'decimal:2|nullable|between:1000,100000000000',
            /* 'is_active' => 'boolean', */
            'capitalize' => 'boolean',
        ];
    }
}
