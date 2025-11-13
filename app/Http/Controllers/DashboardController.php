<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Paiement;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $totalStudents = Student::count();
        $students = Student::all();
        $totalPaiement = Paiement::sum('amount');
        return view('authen.dashboard', compact('totalStudents','students', 'totalPaiement'));
    }

    public function dashboardPost(){
        $totalStudents = Student::count();
        $students = Student::all();
        $totalPaiement = Paiement::sum('amount');
        return view('authen.dashboard', compact('totalStudents', 'students', 'totalPaiement'));
    }

}
