<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{


    public function index()
    {

        if (!Auth::check())  return redirect()->intended('/');

        $user_id = auth()->user()->id;
        $myprofile = User::find($user_id);
        return view('myprofile', compact('myprofile'));
    }


    public function myhistory()
    {
        if (!Auth::check())  return redirect()->intended('/');
        $user_id = auth()->user()->id;
        $myhistory = Checkout::where('user_id', '=', $user_id)->get();

        // dd($myhistory);
        return view('member.myhistory', compact('myhistory'));
    }

    public function detailPembelian($id_checkout)
    {

        return view('member.detail_pembelian', [
            'headerCheckout' =>  Checkout::find($id_checkout),
            'checkoutItem' => DB::table('checkout_detail')->where('checkout_id', $id_checkout)->get()
        ]);
    }
}
