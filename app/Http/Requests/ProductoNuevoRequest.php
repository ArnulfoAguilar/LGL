<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoNuevoRequest extends FormRequest
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
            'nombre' => 'required',
            'tipoProducto_id' => 'required',
            'unidadMedida_id' => 'required',
            'existencia_min' => 'numeric|nullable',
            'existencia_max' => 'numeric|nullable',
            'cantidad' => 'numeric|nullable',
            'valor_unitario' => 'numeric|nullable'
        ];
    }
}
