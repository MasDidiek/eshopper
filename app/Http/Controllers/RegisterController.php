<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('form_register');
    }

    public function do_register(Request $request)
    {

        $dataRegistrasi =  $request->validate([
            'first_name' => 'required|max:50|min:3',
            'middle_name' => 'required|max:50|min:3',
            'last_name' => 'required|max:50|min:3',
            'phone' => 'required|max:20|min:11|unique:users',
            'email' => 'required|email:dns|min:11|unique:users',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],

        ]);

        $dataRegistrasi['password'] = Hash::make($dataRegistrasi['password']);
        User::create($dataRegistrasi);

        //return redirect('/success_register')->with('success', 'Registasi berhasil!! Silahkan melakukan login');
        return redirect('/success_register');
    }


    function success_register()
    {
        return view('success_register');
    }
}
