<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create() {
        return view('user/create');
    }

    public function store(Request $request) {
        $request->validate([
            'login' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users' ],
            'password' => ['required', 'confirmed']
        ]);

        User::create($request->all());

        return redirect()->route('login')->with('success', 'Регистрация завершена!');

    }

    public function login() {
        return view('user/login');
    }

    public function loginAuth(Request $request) {

        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('/');
        }
 
        return back()->withErrors([
            'login' => 'Неверный логин или пароль',
        ])->onlyInput('login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('/');
    }
}
