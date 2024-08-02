<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware("guest")->except('logout');
    }

    public function register() {
        return view("auth.register");
    }

    public function registerSave(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed'
            ])->validate();

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'type'=> 1,
        ]);

        return redirect("")->route('login');
    }

    public function login() {
        return view('auth/login');
    }

    public function loginAction(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password'=> 'required'
            ])->validate();

        // Tentar autenticar como User
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        // Tentar autenticar como Client
        if (Auth::guard('clients')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        // Se falhar em ambos, lançar exceção
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
 {
    Auth::guard('web')->logout();
        Auth::guard('clients')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
 }}
