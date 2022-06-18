<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginPostRequest;
class AuthController extends Controller
{
    


    public function login(LoginPostRequest $request){
        $user = User::where('email', $request->input('email'))->first();
        if($user != null){
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);

        }else{

            return response()->json([
                'success' => false,
                'message' => "Las credenciales son incorrectas",
            ]);

        }
    }


}
