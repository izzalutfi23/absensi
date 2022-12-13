<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employe, Attendance};
use Alert;

class FormController extends Controller
{
    public function index(){
        $employes = Employe::all();
        return view('form', compact('employes'));
    }

    public function store(Request $request){
        $check = Attendance::where('employe_id', $request->employe_id)->whereDate('date', $request->date)->first();
        $image = $request->file('gambar');
        $image->storeAs('public/bukti', $image->hashName());
        if($check){
            Attendance::whereId($check->id)->update([
                'status' => $request->status,
                'value' => $request->value,
                'out' => $request->type == 'out' ? date('H:i:s') : null
            ]);
        }
        else{
            if($request->status == 'H'){
                Attendance::create([
                    'employe_id' => $request->employe_id,
                    'date' => $request->date,
                    'status' => 'H',
                    'in' => $request->type == 'in' ? date('H:i:s') : null,
                    'image' => $image->hashName()
                    // 'out' => $request->type == 'out' ? date('H:i:s') : null
                ]);
            }
            else{
                Attendance::create([
                    'employe_id' => $request->employe_id,
                    'date' => $request->date,
                    'status' => $request->status,
                    'value' => $request->value,
                    'image' => $image->hashName()
                ]);
            }
        }

        Alert::success('Success', 'Data berhasil dikirim!!!');
        return redirect()->back();
    }
}
