<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');//menampilkan login.blade.php pada folder view
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([//mengambil email dan password aja
            'email'    => ['required', 'email'],
            'password' => 'required'
        ]);

        // jika login berhasil / Auth
        if (Auth::attempt($credentials)) {//jika berhasil maka akan di alihkan ke dahsboard.blade.php di folder views
            $request->session()->regenerate();//membuat keamanan standart
            return redirect()->intended("/dashboard");
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->withInput();// jika gagl
    }
}
