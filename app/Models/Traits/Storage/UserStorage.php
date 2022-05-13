<?php

namespace App\Models\Traits\Storage;
use Illuminate\Support\Facades\Hash;
trait UserStorage
{
    //STORE
public function createModel($request){
    $user = $this->create($request->only(['name', 'email'])+['password'=> Hash::make($request->password)]);
    return $user;
}

//update
public function updateModel($request){
    $this->update($request->only(['name', 'email']));
    return $this;
}

public function deleteModel(){
    return  $this->delete();
}
}


