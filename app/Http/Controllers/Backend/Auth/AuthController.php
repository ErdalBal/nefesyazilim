<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

public function signin(Request $request)
{
    $request->flash();
    $user=$request->only('email','password');

    if (Auth::attempt($user)) {
       $request->session()->regenerate();


       return redirect()->intended(route('Dashboard'));

    }else{

     return back()->with('error', 'Kullanıcı Adı veya Şifre Yanlış');

    }
}


public function logout()
{
    Auth::logout();
    return redirect(route('Login'));
}



}
