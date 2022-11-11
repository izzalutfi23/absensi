<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employe, Attendance};
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;

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

        $data = [];
        // Start date
        $year = date('Y');
        $month1 = date('m');
        $date = $year.'-'.$month1.'-01';
        // End date
        $end_date = date('Y-m-t', strtotime($date));
        while (strtotime($date) <= strtotime($end_date)) {
            array_push($data, $date);
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        }

        foreach($attendances as $a){
            if($a->status == 'I'){
                $a->desc = 'Ijin';
            }
            elseif($a->status == 'S'){
                $a->desc = 'Sakit';
            }
            elseif($a->status == 'C'){
                $a->desc = 'Cuti';
            }
            else{
                $a->desc = "";
            }
        }
        return view('page.attendance.detail', compact('employe', 'month', 'attendance', 'attendances', 'data', 'year', 'month1'));
    }

    public function filter(Request $request, $id){
        $employe = Employe::whereId($id)->first();
        $attendance = Attendance::whereDate('date', Carbon::today())->where('employe_id', $employe->id)->first();
        $attendances = Attendance::whereMonth('created_at', Carbon::now())->where('employe_id', $employe->id)->get();
        $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $data = [];
        // Start date
        $year = $request->year;
        $month1 = $request->month;
        $date = $year.'-'.$month1.'-01';
        // End date
        $end_date = date('Y-m-t', strtotime($date));
        while (strtotime($date) <= strtotime($end_date)) {
            array_push($data, $date);
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        }

        foreach($attendances as $a){
            if($a->status == 'I'){
                $a->desc = 'Ijin';
            }
            elseif($a->status == 'S'){
                $a->desc = 'Sakit';
            }
            elseif($a->status == 'C'){
                $a->desc = 'Cuti';
            }
            else{
                $a->desc = "";
            }
        }
        return view('page.attendance.detail', compact('employe', 'month', 'attendance', 'attendances', 'data', 'year', 'month1'));
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
