<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\system\MinimumAmountRule;
use Carbon\Carbon;

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
        // dd($this->all());
        return [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            /* 'user_id' => 'required',
            'product_id' => 'required', */
            'investment_amount' => [
                'decimal:2',
                'required',
                'max:1000000000',
                new MinimumAmountRule($this->input('product_id')),
            ],
            'activation_date' => 'date|required|after_or_equal:today|before_or_equal:'.Carbon::now()->endOfMonth()->format('Y-m-d'),
            /* 'activation_date' => 'required|date', */
            /* 'is_active' => 'boolean', */
            'capitalize' => 'boolean',
        ];
    }
}
