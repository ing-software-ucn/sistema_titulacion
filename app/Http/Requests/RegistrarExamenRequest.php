<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarExamenRequest extends FormRequest
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
            'nota' => 'required||min:1|max:3',
            'fecha_examen' => 'required|date|after:fecha_inicio',
            
        ];
    }

    public function messages()
    {
        return [
            'nota.required' => 'La nota es requerida',
            'fecha_examen.required' => 'La fecha es requerida',
            'fecha_examen.after' => 'La fecha de examen debe ser despues de a fecha de inicio',

        ];
    }
}