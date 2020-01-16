<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'nombre' => 'max:250|required',
            'descripcion' => 'max:250|nullable'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es requerido',
            'nombre.max'  => 'El campo Nombre no debe tener mas de 250 caracteres',
            'descripcion.max'  => 'El campo Descripción no debe tener mas de 250 caracteres'
        ];
    }
}
