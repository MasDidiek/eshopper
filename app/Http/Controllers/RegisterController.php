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


    public function registerApi(Request $request)
    {
        $emailAlready = User::where('email', $request->email)->first();

        if ($emailAlready) {
            return response()->json([
                'message' => 'Email sudah digunakan!',
                'data' => []
            ]);
        }

        $user = new User;
        $user->id = $user::max('id') + 1;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user = $user->save();

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'error',
                'data' => []
            ]);
        }
    }
}
