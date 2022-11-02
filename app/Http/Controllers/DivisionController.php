<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use Alert;

class DivisionController extends Controller
{
    public function index(){
        $divisions = Division::all();
        return view('page.division.index', compact('divisions'));
    }

    public function store(Request $request){
        Division::create([
            'name' => $request->name
        ]);

        Alert::success('Divisi berhasil ditambahkan!');
        return redirect()->back();
    }

    public function destroy($id){
        Division::whereId($id)->delete();

        Alert::success('Divisi berhasil dihapus!');
        return redirect()->back();
    }
}
