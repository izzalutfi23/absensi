<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('page.user.index', compact('users'));
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        Alert::success('Success', 'User berhasil ditambahakn!');
        return redirect()->back();
    }

    public function destroy($id){
        User::whereId($id)->delete();
        Alert::success('Success', 'User berhasil dihapus!');
        return redirect()->back();
    }
}
