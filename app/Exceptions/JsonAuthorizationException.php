<?php

namespace App\Exceptions;

use Exception;

class JsonAuthorizationException extends Exception
{
    public function report(){
        return false;
    }

    public function render($request){
        return response()->json([
            'message'=>'Custom Not authorized'
        ], 403);
    }

    //despues ir al handler y ubicarlo en dontReport para que el log de laravel no este creando a cada rato un archivo log
}
