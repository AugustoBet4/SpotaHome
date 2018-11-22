<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadRequest extends FormRequest
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
            'direccion'=> 'required',
            'ciudad'=> 'required',
            'latitud'=> 'required',
            'longitud'=> 'required',
            'id_dueno'=> 'required',
            'descripcion'=> 'required',
            'zona'=> 'required',
            'costo'=> 'required',
            'fecha_inicio'=> 'required|date|date_format:Y-m-d|after:yesterday',
            'fecha_fin'=> 'required|date_format:Y-m-d|after:fecha_inicio',
            'imagen'=> 'required|image',

        ];
    }
}
