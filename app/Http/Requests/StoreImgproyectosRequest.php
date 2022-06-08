<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImgproyectosRequest extends FormRequest
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
            'txtImagen' => 'required|mimes:png,jpeg|max:10000'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'txtImagen.required' => 'La imagen es requerida',
            'txtImagen.max' => 'La imagen no debe pesar más que 10000 kilobytes',
            'txtImagen.mimes' => 'La imagen debe ser formato: png o jpeg'
        ];
    }
}
