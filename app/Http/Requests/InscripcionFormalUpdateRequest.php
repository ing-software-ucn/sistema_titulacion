<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionFormalUpdateRequest extends FormRequest
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
            'numero_registro' => 'required|integer|min:100|max:999|unique:trabajos,numero_registro,'. $this->numero_registro,       
        ];
    }

    public function messages()
    {
        return [
            'numero_registro.required' => 'El campo no puede que vacio',
            'numero_registro.integer' => 'El campo debe ser un numero entero',
            'numero_registro.min' => 'El numero debe ser entre 100 y 999',
            'numero_registro.max' => 'El numero debe ser entre 100 y 999',

        ];
    }
}