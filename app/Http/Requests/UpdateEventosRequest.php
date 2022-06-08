<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventosRequest extends FormRequest
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
            'responsable' => 'required|max:255',
            'email_contacto' => 'required|email',
            'lugar' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date',
            'hora_inicio' => 'required',
            'hora_termino' => 'required',
            'capacidad' => 'nullable|numeric',
            'inscritos' => 'nullable|numeric',
            'imagen' => 'nullable|mimes:png,jpeg|max:1000',
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
            'responsable.required' => 'El responsable es requerido',
            'responsable.max' => 'El responsable excede los 255 carácteres máximos',
            'email_contacto.required' => 'El correo es requerido',
            'email_contacto.email' => 'El correo no tiene el formato correcto',
            'lugar.required' => 'El lugar es requerido',
            'lugar.max' => 'El lugar excede los 255 carácteres máximos',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
            'fecha_termino.required' => 'La fecha de término es requerida',
            'fecha_inicio.date' => 'Formato de la fecha de inicio no es correcto',
            'fecha_termino.date' => 'Formato de la fecha de término no es correcto',
            'hora_inicio.required' => 'La hora de inicio es requerida',
            'hora_termino.required' => 'La hora de término es requerida',
            'capacidad.numeric' => 'La capacidad deben ser dígitos',
            'inscritos.numeric' => 'Los inscritos deben ser dígitos',
            'imagen.required' => 'La imagen es requerida',
            'imagen.max' => 'La imagen no debe pesar más que 1000 kilobytes',
            'imagen.mimes' => 'La imagen debe ser formato: png o jpeg',
            'video.url' => 'El link no corresponde a una URL',
            'video.starts_with' => 'El link no es de youtube, ocupe el formato sugerido "https://www.youtube.com/watch?v="'
        ];
    }
}
