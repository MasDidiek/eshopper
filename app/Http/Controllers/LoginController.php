<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class LoginController extends Controller
{


    public function index()
    {
        return view('form_login');
    }

    public function do_login(Request $request)
    {
        $cekCredential = $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);


        if (Auth::attempt($cekCredential)) {
            $request->session()->regenerate();

            return redirect()->intended('/product');
        }
        return back()->with('loginError', 'Login Gagal!! email atau password tidak sesuai.');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
