<?php

namespace App\Http\Controllers;

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
        echo 'nova-nota';
    }
    public function editarNota($id)
    {

        $id = Operacoes::decryptId($id);
        echo('<pre>');
        print_r($id);
        echo('</pre>'); die();
        
    }
   
   
}
