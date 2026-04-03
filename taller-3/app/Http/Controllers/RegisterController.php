<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SecurityQuestion;
use App\Models\SecurityResponse;
use Throwable;

class RegisterController extends Controller
{
    public function index()
    {
        $preguntas = SecurityQuestion::all();
        return view("pages/register", ["preguntas" => $preguntas]);
    }

    public function register(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'string|required|confirmed',
            'security_question' => 'string|required',
            'security_question_response' => 'string|required'
        ]);
        try {
            $usuario = User::create(['username' => $credentials['username'], 'password' => $credentials['password']]);
            $respuesta = SecurityResponse::create(['user_id' => $usuario->id, 'question_id' => $credentials['security_question'], "respuesta" => $credentials["security_question_response"]]);
        } catch (Throwable $e) {
            return back()->withErrors(["creation" => "Hubo un error al registrar el usuario, por favor intentelo mas tarde."])->withInput($request->except('password', 'password_confirmation'));
        }

        return redirect()->route('login');
    }
}