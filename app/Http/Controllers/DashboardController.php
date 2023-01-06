<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Attendance, Employe};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $m = date('Y-m-d');
        $attendance = DB::select("SELECT count(id) AS amount, status FROM attendances WHERE date = '$m' GROUP BY status");
        $h = 0;
        $i = 0;
        $s = 0;
        $c = 0;
        $t = 0;
        foreach($attendance as $data){
            if($data->status == 'H'){
                $h = $data->amount;
            }
            elseif($data->status == 'I'){
                $i = $data->amount;
            }
            elseif($data->status == 'S'){
                $s = $data->amount;
            }
            else{
                $c = $data->amount;
            }
        }
        $t = $h+$i+$s+$c;

        // Graphic
        $day = [];
        // Start date
        $year = date('Y');
        $month1 = date('m');
        $date = $year.'-'.$month1.'-01';
        // End date
        $end_date = date('Y-m-t', strtotime($date));
        while (strtotime($date) <= strtotime($end_date)) {
            array_push($day, $date);
            $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
        }

        $tgl = [];
        $hadir = [];
        foreach($day as $d){
            array_push($tgl, date('d', strtotime($d)));
            $ha = Attendance::whereDate('date', $d)->where('status', 'H')->get()->count();
            array_push($hadir, $ha);
        }

        // Employe
        $employes = Employe::all();
        return view('page.dashboard.index', compact('h', 'i', 's', 'c', 't', 'tgl', 'hadir', 'employes'));
    }
}
