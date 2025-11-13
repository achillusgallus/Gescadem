<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student; // Modèle singulier

class StudentsController extends Controller
{
    public function inscription()
    {
        $students = Student::all(); // Utiliser le modèle singulier
        return view('students.studentsInsc', compact('students')); // Variable pluriel
    }

    public function info()
    {
        return view('students.studentsInfo');
    }

    public function paiement()
    {
        return view('students.studentsPaiement');
    }

    public function besoin()
    {
        return view('students.studentsBesoin');
    }
}
