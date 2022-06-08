<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoluntariosRequest extends FormRequest
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
           'txtRut_Voluntario' => 'required|between:8,9',
                'txtNombre' => 'required|max:42',
                'txtApellido_Paterno' => 'required|alpha|max:36',
                'txtApellido_Materno' => 'nullable|alpha|max:36',
                'txtTelefono' => 'required|numeric|digits_between:9,11',
                'txtCorreo' => 'required|email',
                'txtEdad' => 'required|numeric|digits_between:1,2'
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
            'txtRut_Voluntario.required' => 'El Rut es requerido',
            'txtRut_Voluntario.between' => 'El Rut debe estar sin puntos, con guión y dígito verificador',
            'txtNombre.required' => 'El Nombre es requerido',
            'txtNombre.alpha' => 'El Nombre no puede contener números',
            'txtNombre.max' => 'El Nombre excede el límite de 42 carácteres',
            'txtApellido_Paterno.required' => 'El Apellido paterno es requerido',
            'txtApellido_Paterno.alpha' => 'El Apellido paterno no puede contener números',
            'txtApellido_Paterno.max' => 'El Apellido paterno excede el límite de 36 carácteres',
            'txtApellido_Materno.alpha' => 'El Apellido materno no puede contener números',
            'txtApellido_Materno.max' => 'El Apellido materno excede el límite de 36 carácteres',
            'txtTelefono.required' => 'El Teléfono es requerido',
            'txtTelefono.numeric' => 'El Teléfono no es numérico',
            'txtTelefono.digits_between' => 'El Teléfono no tiene entre 9 a 11 dígitos',
            'txtCorreo.required' => 'El Correo es requerido',
            'txtCorreo.email' => 'El Correo no tiene el formato correcto',
            'txtEdad.required' => 'La Edad es requerida',
            'txtEdad.numeric' => 'La Edad debe ser dígitos',
            'txtEdad.digits_between' => 'La Edad debe contener máximo 2 dígitos'

        ];
    }
}
