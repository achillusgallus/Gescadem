<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Modèle singulier

class StudentsController extends Controller
{
    public function inscription()
    {
        $students = Student::all(); // Récupère tous les étudiants
        return view('students.studentsInsc', compact('students')); // Variable pluriel
    }

    // Autres méthodes...
}
