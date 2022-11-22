<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Alert;

class WorkingHourController extends Controller
{
    public function index(){
        $time = Config::where('name', 'time')->first();
        $time->rule = json_decode($time->rule);
        return view('page.working-hour.index', compact('time'));
    }

    public function update(Request $request, $id){
        $rule = [
            'in' => $request->in,
            'out' => $request->out
        ];

        Config::whereId($id)->update([
            'rule' => json_encode($rule)
        ]);

        Alert::success('Success', 'Jam kerja berhasil diperbarui');
        return redirect()->back();
    }
}
