<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteUpdateRequest extends FormRequest
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
            
            'nombre' => 'required|min:2|max:255|regex:/^[a-zA-Z ]+$/',
            'run' => 'required|max:255',
            'carrera' => 'required',
            'telefono' => 'required|min:4|max:16',
            'correo' => 'required|unique:estudiantes,correo,'. $this->estudiante,
        ];
    }

    public function messages()
    {
        return [
            'nombre.regex' => 'El nombre no puede contener numeros o simbolos raros',
            'nombre.required' => 'El nombre es requerido',
            'telefono.required' => 'El telefono es requierido',
            'correo.required' => 'El correo es requerido',
            'correo.unique' => 'El correo ingresado la existe',
        ];
    }
}
