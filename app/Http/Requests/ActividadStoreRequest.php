<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadStoreRequest extends FormRequest
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
            
            'nombre_actividad' => 'required|min:2|max:255|regex:/^[a-zA-Z ]+$/',
            'estudiantes_max'=> 'required', 
            'duracion_semestres'=> 'required', 
            'org_externa'=> 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'nombre_actividad.regex' => 'El nombre no puede contener numeros o simbolos raros',
            'nombre_actividad.required' => 'El nombre es requerido',

        ];
    }
}
