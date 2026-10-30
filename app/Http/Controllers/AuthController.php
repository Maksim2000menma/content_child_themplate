<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Показать форму входа
    public function showLogin(Request $request)
    {
        $session = $request->session();

        return view('auth.login', [
            'csrf'  => $session->token(),
            'error' => $session->get('error'),
            'old'   => $session->get('old_email'),
        ]);
    }

    // Обработать вход
    public function login(Request $request)
    {
        $session = $request->session();

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $session->flash('error', $validator->errors()->first());
            $session->flash('old_email', $request->input('email'));
            return redirect('/login');
        }

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $session->regenerate(); // защита от session fixation
            return redirect('/admin');
        }

        $session->flash('error', 'Неверный email или пароль.');
        $session->flash('old_email', $request->input('email'));
        return redirect('/login');
    }

    // Выход (только POST)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}