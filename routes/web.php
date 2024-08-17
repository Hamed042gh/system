<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ForgotController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle')->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth/{provider}/redirect', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');


Route::get('/change-password',[ForgotController::class,'forgotpasswordForm'])->name('forget-password');
Route::post('/change-password',[ForgotController::class,'checkingEmail'])->name('checkemail');
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail']);

Route::resource('posts', PostController::class)
    ->middleware('auth')
    ->except(['index', 'show']);


Route::resource('posts', PostController::class)
    ->only(['index', 'show']);
Route::resource('profile', ProfileController::class)
    ->middleware('auth')
    ->except(['index', 'show']);


Route::resource('profile', ProfileController::class)
    ->only(['index', 'show']);

