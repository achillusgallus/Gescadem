<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Paiement;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    // Inscription
    public function inscription()
    {
        return view('students.studentsInsc');
    }

    public function storeInscription(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:8',
            'date_of_birth' => 'required|date',
            'level' => 'required|string',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'date_of_birth' => $request->date_of_birth,
            'level' => $request->level,
        ]);

        return redirect()->route('dashboard')->with('success', 'Inscription réussie.');
    }

    // Édition
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.editStudent', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
            'date_of_birth' => 'required|date',
            'level' => 'required|string',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->only(['name', 'email', 'date_of_birth', 'level']));
        return redirect()->route('dashboard')->with('success', 'Étudiant mis à jour!');
    }

    // Suppression
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Étudiant supprimé.');
    }

    // Paiements
    public function paiements()
    {
        $students = Student::all();
        return view('students.studentsPaiement', compact('students'));
    }

    public function storePaiement(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'method' => 'required|string',
            'payment_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
        ]);

        Paiement::create($validated);

        $student = Student::findOrFail($validated['student_id']);
        $student->total_amount = $student->paiements()->sum('amount') + $validated['amount'];
        $student->save();

        return redirect()->back()->with('success', 'Paiement enregistré.');
    }

    public function showPaiement($id)
    {
        $student = Student::with('paiements')->findOrFail($id);
        return view('students.showPayement', compact('student'));
    }

    // Informations étudiants
     public function info()
     {
        $students = Student::with('paiements')->get();
        $totalPaiement = $students->sum(function ($student) {
        return $student->paiements->sum('amount');
        });
         return view('students.infoStudent', compact('students', 'totalPaiement'));
     }

    // public function info()
    //     {
    //         $student = Student::with('paiements')->get();
    //         $totalPaiement = $student->paiements->sum('amount'); // ✅ somme de tous les paiements
    //         return view('students.infoStudent', compact('student', 'totalPaiement'));
    //     }

    // Besoins
    public function besoin()
    {
        return view('students.studentsBesoin');
    }
}
