<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'name' => 'required|alpha|max:42',
            'email' => 'required|email'
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
            'name.required' => 'El nombre es requerido',
            'name.alpha' => 'El nombre no puede contener números',
            'name.max' => 'El nombre excede el límite de 42 carácteres',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo no tiene el formato correcto'

        ];
    }
}
