<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class AttendanceController extends Controller
{
    public function index(){
        $employes = Employe::all();
        return view('page.attendance.index', compact('employes'));
    }

    public function show($id){
        $employe = Employe::whereId($id)->first();
        $month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        return view('page.attendance.detail', compact('employe', 'month'));
    }
}
