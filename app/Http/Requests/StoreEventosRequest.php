<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventosRequest extends FormRequest
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
            'txtResponsable' => 'required|max:255',
            'txtCorreo' => 'required|email',
            'txtLugar' => 'nullable|max:255',
            'txt_fecha_inicio' => 'required|date',
            'txt_fecha_termino' => 'required|date',
            'txt_hora_inicio' => 'required',
            'txt_hora_termino' => 'required',
            'txtCapacidad' => 'nullable|numeric',
            'txtInscritos' => 'nullable|numeric',
            'txtImagen' => 'nullable|mimes:png,jpeg|max:1000',
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
            'txtResponsable.required' => 'El responsable es requerido',
            'txtResponsable.max' => 'El responsable excede los 255 carácteres máximos',
            'txtCorreo.required' => 'El correo es requerido',
            'txtCorreo.email' => 'El correo no tiene el formato correcto',
            'txtLugar.max' => 'El lugar excede los 255 carácteres máximos',
            'txt_fecha_inicio.required' => 'La fecha de inicio es requerida',
            'txt_fecha_termino.required' => 'La fecha de término es requerida',
            'txt_fecha_inicio.date' => 'Formato de la fecha de inicio no es correcto',
            'txt_fecha_termino.date' => 'Formato de la fecha de término no es correcto',
            'txt_hora_inicio.required' => 'La hora de inicio es requerida',
            'txt_hora_termino.required' => 'La hora de término es requerida',
            'txtCapacidad.numeric' => 'La capacidad deben ser dígitos',
            'txtInscritos.numeric' => 'Los inscritos deben ser dígitos',
            'txtImagen.required' => 'La imagen es requerida',
            'txtImagen.max' => 'La imagen no debe pesar más que 1000 kilobytes',
            'txtImagen.mimes' => 'La imagen debe ser formato: png o jpeg',
            'txtVideo.url' => 'El link no corresponde a una URL',
            'txtVideo.starts_with' => 'El link no es de youtube, ocupe el formato sugerido "https://www.youtube.com/watch?v="'
        ];
    }
}
