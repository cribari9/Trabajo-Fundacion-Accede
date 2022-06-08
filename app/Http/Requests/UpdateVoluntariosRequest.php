<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoluntariosRequest extends FormRequest
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
           'rut_voluntario' => 'required|between:8,9',
                'nombre' => 'required|alpha|max:42',
                'apellido_paterno' => 'required|alpha|max:36',
                'apellido_materno' => 'nullable|alpha|max:36',
                'telefono' => 'required|numeric|digits_between:9,11',
                'correo' => 'required|email',
                'edad' => 'required|numeric|digits_between:1,2'
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
            'rut_voluntario.required' => 'El rut es requerido',
            'rut_voluntario.between' => 'El rut debe estar sin puntos, con guión y dígito verificador',
            'nombre.required' => 'El nombre es requerido',
            'nombre.alpha' => 'El nombre no puede contener números',
            'nombre.max' => 'El nombre excede el límite de 42 carácteres',
            'apellido_paterno.required' => 'El apellido paterno es requerido',
            'apellido_paterno.alpha' => 'El apellido paterno no puede contener números',
            'apellido_paterno.max' => 'El apellido paterno excede el límite de 36 carácteres',
            'apellido_materno.alpha' => 'El apellido materno no puede contener números',
            'apellido_materno.max' => 'El apellido materno excede el límite de 36 carácteres',
            'telefono.required' => 'El número de teléfono es requerido',
            'telefono.numeric' => 'El número de teléfono no es numérico',
            'telefono.digits_between' => 'El número de teléfono no tiene entre 9 a 11 dígitos',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo no tiene el formato correcto',
            'edad.required' => 'La edad es requerida',
            'edad.numeric' => 'La edad debe ser dígitos',
            'edad.digits_between' => 'La edad debe contener máximo 2 dígitos'

        ];
    }
}
