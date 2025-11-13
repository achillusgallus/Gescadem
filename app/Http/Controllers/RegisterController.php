<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ajouté

class RegisterController extends Controller
{
    public function creat(){
        if(Auth::check()){
            return redirect()->route('/dashboard'); // si l'authentification est réussie, rediriger vers le tableau de bord
        }
        return view('authen.register'); // sinon, afficher la vue d'enregistrement
    }
    public function connect(){
        if(Auth::check()){
            return redirect()->route('/dashboard'); // si l'authentification est réussie, rediriger vers le tableau de bord
        }
        return view('authen.login'); // sinon, afficher la vue de connexion
    }
            //pour la vérification des informations de connexion
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|required',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard'); // rediriger vers le tableau de bord si la connexion est réussie
        }
        return back()->withErrors([
            'email' => 'Les informations de connexion sont invalides.',
        ])->withInput();
    }

    public function showLoginForm(){
    return view('authen.login');
    }


    //pour l'enregistrement des utilisateurs
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'post' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        //importer notre utilisateur
        User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'post' => $request->post,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }

    //pour la déconnexion des utilisateur

}
