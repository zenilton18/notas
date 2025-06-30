<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        $id = session('user.id');
        $user = Usuario::find($id)->toArray();
        $notas = Usuario::find($id)->notas()->get()->toArray();
       return view('home' , ['notas' => $notas]);
    }
    public function newNota()
    {
         return view('cadastrar_nota');
    }
    public function cadastrarNota(Request $request)
    {
        
        $request->validate(
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:6|max:16'
            ],
            [
                'text_title.required' => 'Insira um Titulo.',
                'text_note.required' => 'Insira um texto.',
                'text_title.min' => 'A titulo deve ter no mínimo :min caracteres.',
                'text_note.max' => 'A texto deve ter no máximo :max caracteres.',
            ]

            );

            $id = session('user.id');
            $nota = new Nota();
            $nota->id_usuario = $id;
            $nota->titulo = $request->text_title;
            $nota->descricao = $request->text_note;

            $nota->save();
            return redirect()->route('home');
    }
    public function editarNota($id)
    {
        $id = Operacoes::decryptId($id);      
        $nota = Nota::find($id);
        return view('editar_nota' , ['nota' => $nota]);
    }

    public function editarNotaForm( Request $request)
    {
        
   
        $request->validate(
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:6|max:16'
            ],
            [
                'text_title.required' => 'Insira um Titulo.',
                'text_note.required' => 'Insira um texto.',
                'text_title.min' => 'A titulo deve ter no mínimo :min caracteres.',
                'text_note.max' => 'A texto deve ter no máximo :max caracteres.',
            ]

            );
      
        if($request->nota_id == null){
            return redirect()->route('home');
        }
        $id = Operacoes::decryptId($request->nota_id);

        $nota = Nota::find($id);
        $nota->titulo = $request->text_title;
        $nota->descricao = $request->text_note;
        $nota->save();
      return redirect()->route('home');
    }

    public function deletarNota($id)
    {
        $id = Operacoes::decryptId($id);      
        $nota = Nota::find($id);
        return view('deletar_nota' , ['nota' => $nota]);
    }
   
    public function deletarNotaForm($id)
    {
        $id = Operacoes::decryptId($id); 
        $nota = Nota::find($id);
        $nota->delete();
        return redirect()->route('home');
    }
   
}
