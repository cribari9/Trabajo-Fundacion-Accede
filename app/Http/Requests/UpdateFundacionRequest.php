<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFundacionRequest extends FormRequest
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
                'direccion' => 'required|max:255',
                'telefono1' => 'required|numeric|digits_between:9,11|unique:fundacions,telefono2',
                'telefono2' => 'nullable|numeric|digits_between:9,11|unique:fundacions,telefono1',
                'correo1' => 'required|email|max:255|unique:fundacions,correo2',
                'imagen1' => 'nullable|mimes:png,jpeg|max:1000',
                'imagen2' => 'nullable|mimes:png,jpeg|max:1000',
                'imagen3' => 'nullable|mimes:png,jpeg|max:1000',
                'correo2' => 'max:255|email|unique:fundacions,correo1'
                
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
           
            'telefono1.required' => 'El número de teléfono 1 no es requerido',
            'telefono1.numeric' => 'El número de teléfono 1 no es numérico',
            'telefono2.numeric' => 'El número de teléfono 2 no es numérico',
            'telefono2.digits_between' => 'El número de teléfono 2 no tiene entre 9 a 11 dígitos',
            'imagen1.max' => 'La imagen1 no debe pesar más que 1000 kilobytes',
            'imagen1.mimes' => 'La imagen1 debe ser formato: png o jpeg',
            'imagen2.max' => 'La imagen2 no debe pesar más que 1000 kilobytes',
            'imagen2.mimes' => 'La imagen2 debe ser formato: png o jpeg',
            'imagen3.max' => 'La imagen3 no debe pesar más que 1000 kilobytes',
            'imagen3.mimes' => 'La imagen3 debe ser formato: png o jpeg',
            'correo1.required' => 'El correo 1 es requerido',
        ];
    }
}
