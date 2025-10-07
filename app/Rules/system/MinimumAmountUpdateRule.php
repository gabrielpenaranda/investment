<?php

/* namespace App\Rules\system;

use App\Models\system\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MinimumAmountRule implements ValidationRule
{
    protected $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Product::find($this->productId);

        if (!$product) {
            $fail('El producto no existe.');
            return;
        }
        $message = __('messages.Minimum investment must be equal or grater than') . ' ' . $product->minimum_investment . '.';
        if ($value < $product->minimum_investment) {
            $fail($message);
        }
    }
} */

namespace App\Rules\system;

use App\Models\system\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MinimumAmountUpdateRule implements ValidationRule
{
    protected $productId;
    protected $currentInvestmentAmount; // Valor almacenado de investment_amount
    protected $amountChange; // Valor de amount_change (0, 1 o 2)

    public function __construct($productId, $currentInvestmentAmount, $amountChange)
    {
        $this->productId = $productId;
        $this->currentInvestmentAmount = $currentInvestmentAmount;
        $this->amountChange = $amountChange;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Product::find($this->productId);

        if (!$product) {
            $fail('El producto no existe.');
            return;
        }

        $minimumInvestment = $product->minimum_investment;
        // $message = __('messages.Minimum investment must be equal or greater than') . ' ' . $minimumInvestment . '.';

        // Verificar si el valor introducido es menor que el monto mínimo del producto
        /* if ($value < $minimumInvestment) {
            $fail($message);
            return;
        } */

        // Si amount_change es 0 (Retiro), verificar que el saldo restante no sea menor al monto mínimo
        if ($this->amountChange == 0) {
            $remainingAmount = $this->currentInvestmentAmount - $value;

            if ($remainingAmount < $minimumInvestment) {
                $fail(__('messages.The remaining amount after withdrawal must be equal or greater than') . ' ' . $minimumInvestment . '.');
                return;
            }
        }
    }
}
