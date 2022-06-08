<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMiembrosRequest extends FormRequest
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
            'txtRut_Miembro' => 'required|between:9,10',
            'txtNombre' => 'required|alpha|max:42',
            'txtApellido_Paterno' => 'required|alpha|max:36',
            'txtApellido_Materno' => 'nullable|alpha|max:36',
            'txtTelefono' => 'required|numeric|digits_between:9,11',
            'txtImagen' => 'nullable|mimes:png,jpeg|max:1000',
            'txtCorreo' => 'required|email'
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
            'txtRut_Miembro.required' => 'El rut es requerido',
            'txtRut_Miembro.between' => 'El rut debe estar sin puntos, con guión y dígito verificador',
            'txtNombre.required' => 'El nombre es requerido',
            'txtNombre.alpha' => 'El nombre no puede contener números',
            'txtNombre.max' => 'El nombre excede el límite de 42 carácteres',
            'txtApellido_Paterno.required' => 'El apellido paterno es requerido',
            'txtApellido_Paterno.alpha' => 'El apellido paterno no puede contener números',
            'txtApellido_Paterno.max' => 'El apellido paterno excede el límite de 36 carácteres',
            'txtApellido_Materno.alpha' => 'El apellido materno no puede contener números',
            'txtApellido_Materno.max' => 'El apellido materno excede el límite de 36 carácteres',
            'txtTelefono.required' => 'El número de teléfono es requerido',
            'txtTelefono.numeric' => 'El número de teléfono no es numérico',
            'txtTelefono.digits_between' => 'El número de teléfono no tiene entre 9 a 11 dígitos',
            'txtImagen.max' => 'La foto no debe pesar más que 1000 kilobytes',
            'txtImagen.mimes' => 'La foto debe ser formato: png o jpeg',
            'txtCorreo.required' => 'El correo es requerido',
            'txtCorreo.email' => 'El correo no tiene el formato correcto'

        ];
    }
}
