<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovesProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'operation' => 'required|in:0,1',
            'quantity' => 'required|numeric|gt:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'operation.required' => 'O campo "operation" é obrigatório.',
            'operation.in' => 'O campo "operation" deve ser 0 (zero) ou 1 (um).',
            'quantity.required' => 'O campo "quantity" é obrigatório.',
            'quantity.numeric' => 'O campo "quantity" deve ser numérico.',
            'quantity.gt' => 'O campo "quantity" deve ser maior que 0 (zero).',
        ];
    }
}