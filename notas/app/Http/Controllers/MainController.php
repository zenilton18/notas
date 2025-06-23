<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo 'principal';
    }
    public function newNota()
    {
        echo 'nova-nota';
    }
   
}
