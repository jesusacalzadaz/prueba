<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CustomerPostRequest extends GeneralRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = $this->request;
        return [
            'dni' => [
                'required',
                'string',
                'between:1,45',
                 Rule::unique('customers')->where(function ($query){
                        return $query->whereIn('status', ["A","I"]);
                    })
            ],
            'id_reg' => 'required|numeric',
            'id_com' => 
            [
                    'required',
                    'numeric',
                    Rule::exists('communes')->where(function ($query)use($request){
                        return $query->join('regions','communes.id_reg','=','regions.id_reg')->where('id_reg', '=',$request->get('id_reg'));
                    })
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'between:6,120',
                 Rule::unique('customers')->where(function ($query){
                        return $query->whereIn('status', ["A","I"]);
                    })
            ],
            'name' => 'required|string|between:1,45',
            'last_name' => 'required|string|between:1,45',
            'address' => 'string|between:1,255',
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
            'dni.required'=>'El dni es requerido',
            'dni.string'=>'El formato del dni es incorrecto',
            'dni.between'=>'El dni debe contener de 1 a 45 caracteres',
            'dni.unique'=>'El dni ya existe',
            'id_reg.required'=>'El id de region es requerido',
            'id_reg.numeric'=>'El formado del id de region es incorrecto',
            'id_com.required'=>'El id de comunidad es requerido',
            'id_com.numeric'=>'El formato del id de comunidad es incorrecto',
            'id_com.exists'=>'El id de region y de comunidad no tienen una relación o son incorrectos',
            'email.required'=>'El email es requerido',
            'email.email'=>'El formato del email es incorrecto',
            'email.between'=>'El email debe contener de 6 a 120 caracteres',
            'email.unique'=>'El email ya existe',
            'name.required'=>'El nombre es requerido',
            'name.string'=>'El formato del nombre es incorrecto',
            'name.between'=>'El campo de nombre debe contener de 1 a 45 caracteres',
            'last_name.required'=>'El apellido es requerido',
            'last_name.string'=>'El formato del apellido es incorrecto',
            'last_name.between'=>'El campo de apellido debe contener de 1 a 45 caracteres',
            'address.string'=>'El formato de la direccion es incorrecto',
            'address.between'=>'La dirección debe contener de 1 a 255 caracteres.'
        ];
    }
}
