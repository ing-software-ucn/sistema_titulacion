<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajoStoreRequest extends FormRequest
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

            'title' => 'required|min:2|max:64|regex:/^[a-zA-Z ]+$/',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.regex' => 'El nombre no puede contener numeros o simbolos raros',
            'title.required' => 'El nombre es requerido',
            'title.min' => 'Nombre demasiado corto',
            'title.max' => 'Nombre demasiado largo',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
            'fecha_termino.required' => 'La fecha de termino es requerida',


        ];
    }
}
