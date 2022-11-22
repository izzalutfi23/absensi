<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Division, Employe};
use Alert;

class EmployeController extends Controller
{
    public function index(){
        $divisions = Division::all();
        $employes = Employe::all();
        return view('page.employe.index', compact('divisions', 'employes'));
    }

    public function store(Request $request){
        Employe::create([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        Alert::success('success', 'Data karyawan berhasil disimpan!');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        Employe::whereId($id)->update([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        Alert::success('success', 'Data karyawan berhasil diubah!');
        return redirect()->back();
    }

    public function destroy($id){
        Employe::whereId($id)->delete();

        Alert::success('Data karyawan berhasil dihapus!');
        return redirect()->back();
    }
}
