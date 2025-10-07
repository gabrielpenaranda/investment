<?php

namespace App\Rules\system;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;

class ComparePassword implements ValidationRule
{
    /**
     * El nombre del segundo campo (password2).
     *
     * @var string
     */
    protected $secondField;

    /**
     * Crea una nueva instancia de la regla.
     *
     * @param string $secondField El nombre del segundo campo a comparar.
     */
    public function __construct(string $secondField)
    {
        $this->secondField = $secondField;
    }

    /**
     * Ejecuta la regla de validación.
     *
     * @param string $attribute El nombre del atributo que se está validando.
     * @param mixed $value El valor del primer campo (password).
     * @param \Closure(string): void $fail La función de error.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Obtener el valor del segundo campo desde el contexto de la solicitud
        $secondFieldValue = request()->input($this->secondField);

        $message = __('messages.Password and its confirmation must match');

        // Comparar los valores de los dos campos
        if ($value !== $secondFieldValue) {
            $fail($message);
        }
    }
}