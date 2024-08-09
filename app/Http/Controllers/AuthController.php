<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    protected $authservice;

    public function __construct(AuthService $authservice)
    {

        $this->authservice = $authservice;
    }


    public function registerForm()
    {

        return view('register');
    }


    public function register(RegisterRequest $request)
    {

        $user = $this->authservice->register($request->validated());

        event(new UserRegistered($user));

        return redirect()->route('registerForm')->with('status', 'Register successfully!!!');
    }
}
