<?php

namespace App\Exceptions;

use Exception;

class AuthenticateException extends Exception
{
    public function report(){
        return false;
    }

    public function render($request){
        return response()->json([
            'message'=>'AuthenticateException'
        ], 401);
    }

    //despues ir al handler y ubicarlo en dontReport para que el log de laravel no este creando a cada rato un archivo log
}
