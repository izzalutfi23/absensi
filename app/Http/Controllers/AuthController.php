<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.index');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('status','Email atau password salah !!!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
