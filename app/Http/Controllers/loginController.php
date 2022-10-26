<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    function login(Request $req){

        $this->validate($req,['login'=> 'required'],['login.required'=>'Podaj login']);
        $this->validate($req,['password'=> 'required'],['password.required'=>'Podaj hasło']);
         
        $req->validate(
            [
                'login'=>'required',
                'password'=>'required'
            ]);

        return $req->input();
    }
}
