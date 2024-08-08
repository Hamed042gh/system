<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',[AuthController::class,'registerForm'])->name('registerForm');
Route::post('/register',[AuthController::class,'register'])->name('register');
