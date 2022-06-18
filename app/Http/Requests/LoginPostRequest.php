<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends GeneralRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
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
            'email.required' => 'El email es requerido',
            'email.email' => 'El formato del email es incorrecto',
            'password.required' => 'La contraseña es requerida',
            'password.string' => 'El formato de la contraseña es incorrecto',
            'password.min' => 'El formato de la contraseña es incorrecto',
        ];
    }
}
