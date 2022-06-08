<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMiembrosRequest extends FormRequest
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
            'nombre' => 'required|alpha|max:42',
            'apellido_paterno' => 'required|alpha|max:36',
            'apellido_materno' => 'nullable|alpha|max:36',
            'telefono' => 'required|numeric|digits_between:9,11',
            'foto' => 'nullable|mimes:png,jpeg|max:1000',
            'correo' => 'required|email'
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
            'foto.max' => 'La foto no debe pesar más que 1000 kilobytes',
            'foto.mimes' => 'La foto debe ser formato: png o jpeg',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo no tiene el formato correcto'

        ];
    }
}
