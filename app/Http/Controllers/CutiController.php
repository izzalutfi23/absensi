<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cuti, Employe};
use Alert, PDF;

class CutiController extends Controller
{
    public function index(){
        $employes = Employe::all();
        $cuties = Cuti::orderBy('created_at', 'desc')->get();
        return view('page.cuti.index', compact('employes', 'cuties'));
    }

    public function store(Request $request){
        Cuti::create([
            'employe_id' => $request->employe_id,
            'jenis_cuti' => $request->jenis_cuti,
            'tgl' => $request->tgl,
            'alasan' => $request->alasan,
            'lama_cuti' => $request->lama_cuti,
            'setuju' => '0'
        ]);

        Alert::success('Success', 'Pengajuan cuti berhasil ditambahkan!');
        return redirect()->back();
    }

    public function destroy($id){
        Cuti::whereId($id)->delete();
        Alert::success('Success', 'Data pegajuan cuti berhasil dihapus!');
        return redirect()->back();
    }

    public function approve($id){
        Cuti::whereId($id)->update([
            'setuju' => '1'
        ]);

        Alert::success('Success', 'Pengajuan cuti berhasil disetujui!');
        return redirect()->back();
    }

    public function pdf($id){
        $cuti = Cuti::whereId($id)->first();
        $pdf = PDF::loadview('page.cuti.pdf', compact('cuti'));
	    return $pdf->stream('pengajuan-cuti');
    }
}
