<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Throwable;


Class LoginController extends Controller{
    public function login(){
        return view("pages/login");
    }
    public function index(){
        return view("pages/dashboard");
    }
    public function auth(Request $request){

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            
            $request->session()->regenerate();
            return redirect()->intended(route('crud.index')); 
        }
        return back()->withErrors([
            'username' => 'Credenciales inválidas, inténtelo nuevamente.'
        ])->onlyInput('username');
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}