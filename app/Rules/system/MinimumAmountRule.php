<?php

namespace App\Rules\system;

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
}
