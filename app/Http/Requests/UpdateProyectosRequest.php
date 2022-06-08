<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProyectosRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:800',
            'lugar' => 'required|max:255',
            'fecha' => 'required',
            'imagen' => 'required|mimes:png,jpeg|max:1000',
            'video'  => 'nullable|url|starts_with:https://www.youtube.com/watch?v='
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
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre excede los 255 carácteres máximos',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.max' => 'La descripción excede los 255 carácteres máximos',
            'lugar.required' => 'El lugar es requerido',
            'lugar.max' => 'La descripción excede los 255 carácteres máximos',
            'fecha.required' => 'La fecha es requerida',
            'imagen.required' => 'La imagen es requerida',
            'imagen.max' => 'La imagen no debe pesar más que 1000 kilobytes',
            'imagen.mimes' => 'La imagen debe ser formato: png o jpeg',
            'video.url' => 'El link no corresponde a una URL',
            'video.starts_with' => 'El link no es de youtube, ocupe el formato sugerido "https://www.youtube.com/watch?v="'
        ];
    }
}
