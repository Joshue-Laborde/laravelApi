<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\ShowRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

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

    public function create(CreateRequest $request){

        $user = new User;
        $user= $user->createModel($request);
        return new UserResource($user);

      /*  return response()->json([
            'succes'=>true
        ]); */ //se considera mala practica llenar todo aqui o definir los datos en el constructor, sino en los request
    }

    public function show(ShowRequest $request){
        $user = User::findOrfail($request->user_id);
        return new UserResource($user);

    }


}
