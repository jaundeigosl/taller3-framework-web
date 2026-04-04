<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SecurityQuestion;
use App\Models\SecurityResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Throwable;


Class LoginController extends Controller{
    public function login(){
        return view("pages/login");
    }

    public function auth(Request $request){

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            
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

    public function recoveryView(){
        return view('pages/recovery');
    }

    public function recovery(Request $request){

        $credential = $request->validate([
            'username' => 'required|string'
        ]);

        $user= User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Error en el nombre de usuario.']);
        }

        $securityResp = SecurityResponse::where('user_id', $user->id)->first();
        $securityQuest = SecurityQuestion::where('id', $securityResp->question_id)->first();
        return view('pages/recovery', ['user_id' => $user->id, 'pregunta' => $securityQuest]);
    }

    public function validateSecAnswer(Request $request){

        $resp = $request->validate(['security_question_response' => 'string|required' , 'user_id' =>'string|required']);
        $exist = SecurityResponse::where('user_id', $resp['user_id'])->where('respuesta' , $resp['security_question_response'])->first();

        if($exist){
            return view('pages/newPassword', ['user_id' =>$resp['user_id']]);
        }else{
            return back()->withErrors(['response' => 'Respuesta invalida']);
        }

    }

    public function newPassword(Request $request){
        $credentials = $request->validate([
            'password' => 'string|required|confirmed',
            'user_id' => 'string|required'
        ]);

        $user = User::find($credentials['user_id']);

        $user->update([
            'password' => $credentials['password']
        ]);

        return redirect()->route('login')->with('success', '¡Tu contraseña ha sido actualizada exitosamente! Ya puedes iniciar sesión.');
    }

}