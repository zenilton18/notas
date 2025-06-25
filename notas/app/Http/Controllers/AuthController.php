<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

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

        try {
            $user = Usuario::where('nome',$userName)->where('deleted_at', null)->first();
            if(!$user){
                return redirect()->back()->withInput()->with('loginErro', 'Usuario ou senha invalidos');
            }

            if(!password_verify($password, $user->senha)){
                return redirect()->back()->withInput()->with('loginErro', 'Usuario ou senha invalidos');
            }

            $user->ultimo_login = date('Y-m-d H:i:s');
            $user->save();

            session([
                'user' => [
                    'id' => $user->id,
                    'nome' => $user->nome
                ]
            ]);

            return redirect()->to('/');
            
        } catch (\PDOException $erros) {
            echo 'A conexão falhou'. $erros->getMessage();
            //throw $th;
        }
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
