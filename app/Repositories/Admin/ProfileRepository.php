<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileRepository
{
    public function getUser(){
        return User::find(auth()->user()->id);

    }
    public function update($user , $request){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return $user;
    }

    
    public function change_password($user , $request){
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }
}
