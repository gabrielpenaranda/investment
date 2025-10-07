<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\system\MinimumAmountUpdateRule;
use App\Models\system\Investment;

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
        $productId = $this->input('product_id');
        // $investmentId = $this->route('investment'); // Suponiendo que el ID de la inversión está en la ruta
        $currentInvestmentAmount = Investment::find($this->input('investment_id'))->investment_amount ?? 0;

        $amountChange = $this->input('amount_change');

        return [
            /* 'investment_amount' => 'decimal:2|required|between:1000,100000000000', */
            /* $this->filled('amount') && $this->amount != $investment->amount
                    ? 'decimal:2|required|between:1000,100000000000'
                    : 'nullable', */
            /* 'investment_amount' => 'decimal:2|nullable|between:1000,100000000000', */
            /* 'is_active' => 'boolean', */
            'capitalize' => 'boolean',
            'investment_amount' => [
                'decimal:2',
                'nullable',
                'max:1000000000',
                new MinimumAmountUpdateRule($productId, $currentInvestmentAmount, $amountChange),
            ],
            'amount_change' => 'required|in:0,1,2'
        ];
    }
}
