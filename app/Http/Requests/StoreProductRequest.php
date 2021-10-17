<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'sku' => 'required|string|max:10|unique:App\Models\Product,sku',
            'quantity' => 'required|numeric',
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
            'name.required' => 'O campo "name" é obrigatório.',
            'name.max' => 'O tamanho máximo do "name" é de 100 caracteres.',
            'sku.required' => 'O campo "sku" é obrigatório.',
            'sku.max' => 'O tamanho máximo do "sku" é de 10 caracteres.',
            'sku.unique' => 'O campo "sku" deve ser único.',
            'quantity.required' => 'O campo "quantity" é obrigatório.',
            'quantity.numeric' => 'O campo "quantity" deve ser numérico.',
        ];
    }
}