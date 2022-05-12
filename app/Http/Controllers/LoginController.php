<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthenticateException;

class LoginController extends Controller
{
    public function authenticate(Request $request){

        //obtenemos el email y contraseña del usuario
        $credentials = $request->only('email', 'password');

        //hacemos el intento del usuario verificado
        if(Auth::attempt($credentials)){
            //obtiene el token y lo muestra con el plainTextToken
            $token = Auth::user()->createToken(Auth::id())->plainTextToken;


            return response()->json([
                'token'=> $token
            ]);
        }

        throw new AuthenticateException;

    }
}
