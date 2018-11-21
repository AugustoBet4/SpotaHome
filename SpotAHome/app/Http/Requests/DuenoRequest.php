<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DuenoRequest extends FormRequest
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
            'apellidos'=> 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required|date_format:Y-m-d|before:yesterday',
            'genero' => 'required',
            'nacionalidad' => 'required',
            'usuario'=> 'required',
            'contrasena'=> 'required',
            'contrasena2'=> 'required|same:contrasena',
        ];
    }
}
