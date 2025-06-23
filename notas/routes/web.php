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
    Route::get('/' ,[MainController::class, 'index']);
    Route::get('/newNota', [MainController::class, 'index']);
    Route::get('/logout',[AuthController::class,'logout']);
});

