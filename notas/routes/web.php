<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\ChekinIslogged;
use App\Http\Middleware\ChekinIsNotlogged;
use Illuminate\Support\Facades\Route;


Route::middleware([ChekinIsNotlogged::class])->group(function(){
    #rotas login
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/loginSubmit',[AuthController::class,'loginSubmit']);
});

#rotas para verificar login
Route::middleware([ChekinIslogged::class])->group(function(){
    Route::get('/' ,[MainController::class, 'index'])->name('home');
    Route::get('/newNota', [MainController::class, 'newNota'])->name('new');
    Route::post('/cadastrar', [MainController::class, 'cadastrarNota'])->name('cadastrar');

    Route::get('/editar/{id}',[MainController::class, 'editarNota'])->name('editar');
    Route::post('/editar',[MainController::class, 'editarNotaform'])->name('editarForm');

    Route::get('/delete/{id}',[MainController::class, 'deletarNota'])->name('deletar');
    Route::get('/deleteConfirm/{id}',[MainController::class, 'deletarNotaForm'])->name('deletarForm');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});

