<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StateUpdateRequest extends FormRequest
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
                Rule::unique('states', 'name')->ignore($this->state->id),
            ],
            'code' => [
                'string',
                'required',
                'max:3',
                // Use Rule::unique to specify the ignored ID
                Rule::unique('states', 'code')->ignore($this->state->id),
            ],
            'country_id' => 'integer|required',
        ];
    }
}
