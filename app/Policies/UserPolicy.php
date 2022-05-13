<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /* public function before($user, $ability){
        if($user->isAdmin()){
            return true;
        }
    } */

    //reglas de validacion de politicas de usuario


    public function create(User $user){
       // return $user->hasPermission('create_user');

       return true;
    }

    public function view(User $user, User $model){

        return true;
     }

     public function update(User $user, User $model){

        return true;
     }

     public function delete(User $user, User $model){

        return true;
     }


}
