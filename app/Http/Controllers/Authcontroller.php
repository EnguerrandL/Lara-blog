<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    

    public function login(){
        return view('auth.login');
    }


    public function loged(LoginRequest $request){

        $credentials = $request->validated();


      if( Auth::attempt($credentials)){
       $request->session()->regenerate();

       return redirect()->intended(route('admin.index'));

      }
      return to_route('auth.login')->withErrors([
        'email' => 'Les informations sont éronnées',
        'password' => 'Les informations sont éronnées',
       
      ])->onlyInput('email');


        return view('auth.login');
    }

    public function logOut(){

        Auth::logout();

        return to_route('blog.index');

    }
}
