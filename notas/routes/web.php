<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#rotas login
Route::get('/login',[AuthController::class,'login']);
Route::post('/loginSubmit',[AuthController::class,'loginSubmit']);
Route::get('/logout',[AuthController::class,'logout']);