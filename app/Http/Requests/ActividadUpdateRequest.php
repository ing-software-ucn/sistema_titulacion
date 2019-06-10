<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadUpdateRequest extends FormRequest
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
    
            'nombre_actividad' => 'required|min:2|max:255',
            'estudiantes_max'=> 'required', 
            'duracion_semestres'=> 'required', 
            'org_externa'=> 'required', 
            
        ];
    }
}
