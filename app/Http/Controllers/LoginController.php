<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginAction(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // jika login berhasil
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended("/dasboard");
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->withInput();
    }
}
