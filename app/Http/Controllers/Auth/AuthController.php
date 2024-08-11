<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Events\UserRegistered;
use App\Http\Requests\LoginRequest;
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

        return redirect()
            ->route('dashboard')
            ->with('status', 'Register successfully!!!');
    }


    public function loginForm()
    {

        return view('login');
    }


    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if ($this->authservice->login($credentials)) {

            return redirect()->route('dashboard')
                ->with('status', 'you are login');
        }
        return redirect()->route('login')
            ->with('error', 'invalid email or password')
            ->withInput($request->only('email'));
    }
}
