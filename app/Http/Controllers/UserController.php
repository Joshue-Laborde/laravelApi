<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\IndexRequest;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    //proteger las rutas
    public function __construct()
    {
        //$this->middleware('auth:sanctum')->except('index'); protege todo menos la funcion index

        //Si no estas autenticado y quieres realizar algunos de los metodos del controlador, se ejecuta el middleware
        $this->middleware('auth:sanctum');
    }



    public function index(IndexRequest $request){

       //Sin el resource
        /*  $users = User::all();

        return response()->json([
            'users'=>  $users
        ]); */

        //CON Resource va devolver los datos
        return  UserResource::collection(User::all());

    }


}
