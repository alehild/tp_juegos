<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   

    public   function check()
    {

       dd(\Auth::check());

    }

    public   function user()
    {

       dd(\Auth::user());
       
    }

    public   function id()
    {

       dd(\Auth::id());
    
    }
    
    public   function logout()
    {

       \Auth::logout();
       dd(\Auth::check());
    }

    public   function login()
    {
      $user = User::find(1);
      \Auth::login($user);
       dd(\Auth::check());
    }
}
