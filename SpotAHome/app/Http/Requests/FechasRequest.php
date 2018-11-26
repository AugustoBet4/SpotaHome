<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FechasRequest extends FormRequest
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
            'status_alquiler' => 'required',
            'fecha_inicio' => 'required|date|date_format:Y-m-d|after:yesterday',
            'fecha_fin' => 'required|date_format:Y-m-d|after:fecha_inicio'
        ];
    }
}
