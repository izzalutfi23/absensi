<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employe, Attendance};
use Carbon\Carbon;
use Alert;

class AttendanceController extends Controller
{
    public function index(){
        $employes = Employe::all();
        return view('page.attendance.index', compact('employes'));
    }

    public function show($id){
        $employe = Employe::whereId($id)->first();
        $attendance = Attendance::whereDate('date', Carbon::today())->where('employe_id', $employe->id)->first();
        $attendances = Attendance::whereMonth('created_at', Carbon::now())->where('employe_id', $employe->id)->get();
        $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        return view('page.attendance.detail', compact('employe', 'month', 'attendance', 'attendances'));
    }

    public function action($employe_id, $status){
        $attendance = Attendance::whereDate('date', Carbon::today())->where('employe_id', $employe_id)->first();
        if($attendance){
            Attendance::whereId($attendance->id)->update([
                'employe_id' => $employe_id,
                'date' => date('Y-m-d'),
                'status' => 'H',
                'out' => $status == 'out' ? date('H:i:s') : null
            ]);
        }
        else{
            Attendance::create([
                'employe_id' => $employe_id,
                'date' => date('Y-m-d'),
                'status' => 'H',
                'in' => $status == 'in' ? date('H:i:s') : null,
                'out' => $status == 'out' ? date('H:i:s') : null
            ]);
        }

        Alert::success('Berhasil melakukan absensi!');
        return redirect()->back();
    }
}
