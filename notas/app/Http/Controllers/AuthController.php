<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            [
                'text_username.required' => 'O e-mail é obrigatório.',
                'text_username.email' => 'Informe um e-mail válido.',
                'text_password.required' => 'A senha é obrigatória.',
                'text_password.min' => 'A senha deve ter no mínimo :min caracteres.',
                'text_password.max' => 'A senha deve ter no máximo :max caracteres.',
            ]

            );
        $userName = $request->input('text_username');
        $password = $request->input('text_password');
        
        
        echo 'ok';
    
    }
    public function logout()
    {
        echo 'logout';
    }
}
