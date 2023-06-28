<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

class Login extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('login');
    }

    public function authlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($data)) {
            return redirect('dashboard');
        } else {
            Session::flash('pesan_gagal', 'email atau password salah');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
