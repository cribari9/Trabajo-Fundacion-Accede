<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyectosRequest extends FormRequest
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
            'txtNombre' => 'required|max:255',
            'txtDescripcion' => 'required|max:800',
            'txtLugar' => 'required|max:255',
            'txtFecha' => 'required',
            'txtImagen' => 'required|mimes:png,jpeg|max:1000',
            'txtVideo'  => 'nullable|url|starts_with:https://www.youtube.com/watch?v='
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
            'txtNombre.required' => 'El nombre es requerido',
            'txtNombre.max' => 'El nombre excede los 255 carácteres máximos',
            'txtDescripcion.required' => 'La descripción es requerida',
            'txtDescripcion.max' => 'La descripción excede los 800 carácteres máximos',
            'txtLugar.required' => 'El lugar es requerido',
            'txtLugar.max' => 'La descripción excede los 255 carácteres máximos',
            'txtFecha.required' => 'La fecha es requerida',
            'txtImagen.required' => 'La imagen es requerida',
            'txtImagen.max' => 'La imagen no debe pesar más que 1000 kilobytes',
            'txtImagen.mimes' => 'La imagen debe ser formato: png o jpeg',
            'txtVideo.url' => 'El link no corresponde a una URL',
            'txtVideo.starts_with' => 'El link no es de youtube, ocupe el formato sugerido "https://www.youtube.com/watch?v="'
        ];
    }
}
