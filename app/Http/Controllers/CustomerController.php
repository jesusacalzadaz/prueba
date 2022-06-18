<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerPostRequest;
use App\Models\Customer;
class CustomerController extends Controller
{
    //


    public function consultDniEmail($dniOrEmail){
        $Customer = Customer::join('communes',function($query){
                $query->on('customers.id_reg','=','communes.id_reg')->on('customers.id_com','=','communes.id_com');
        })->join('regions','communes.id_reg','=','regions.id_reg')->select('customers.name','customers.last_name','customers.address','regions.description as region','communes.description as commune')->where(function($query)use($dniOrEmail){
                $query->where('customers.dni','=',$dniOrEmail)->orWhere('customers.email','=',$dniOrEmail);
        })->where('customers.status','=','A')->first();
        if($Customer != null){
            return response()->json([
                'success' => true,
                'customer' =>$Customer
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'El cliente no existe'
            ],401);
        }
    }


   
    

    public function create(CustomerPostRequest $request){
        $Customer = new Customer();
        $Customer->dni = $request->dni;
        $Customer->email = $request->email;
        $Customer->name = $request->name;
        $Customer->last_name = $request->last_name;
        $Customer->address = $request->address;
        $Customer->id_reg = $request->id_reg;
        $Customer->id_com = $request->id_com;
        $Customer->date_reg = date("Y-m-d H:i:s");
        $Customer->status = "A";
        if($Customer->save()){
            return response()->json([
                'success' => true,
                'message' =>'Se creó el cliente con éxito'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'Se genero un error en el servidor, por favor intenta de nuevo'
            ],500);
        }
    }

    public function deleteDni($dni){
        $Customer = Customer::where('customers.dni','=',$dni)->whereIn('customers.status',['A','I'])->first();
        if($Customer != null){
            $Customer->status = "trash";
            if($Customer->save()){
                  return response()->json([
                        'success' => true,
                        'message' =>'Se eliminó el cliente con éxito'
                    ]);
            }else{
                    return response()->json([
                        'success' => false,
                        'message'=>'Se genero un error en el servidor, por favor intenta de nuevo'
                    ],500);
            }
        }else{
            return response()->json([
                'success' => false,
                'message'=>'El cliente no existe'
            ],401);
        }

    }

    

}
