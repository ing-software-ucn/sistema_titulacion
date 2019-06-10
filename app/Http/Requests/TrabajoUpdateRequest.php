<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajoUpdateRequest extends FormRequest
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
            'id_actividad',
            'nombre_trabajo',
            'org_nombre',
            'tutor_nombre',
            'numero_registro' => 'required',
            'fecha_inicio',
            'fecha_termino',
            'estado',
        ];
    }
}
