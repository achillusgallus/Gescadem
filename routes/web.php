<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LogoutController;

Route::get('/welcome', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/', [RegisterController::class, 'creat'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('authen.register');

Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login'])->name('authen.login');

// Logout route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'dashboardPost'])->name('dashboard.store');

// Student routes
Route::get('/students/inscription', [StudentsController::class, 'inscription'])->name('students.inscription');
Route::post('/students/inscription', [StudentsController::class, 'storeInscription'])->name('students.storeInscription');

Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');

// Paiement routes
Route::get('/students/paiement', [StudentsController::class, 'paiements'])->name('students.paiement');
Route::post('/students/paiement', [StudentsController::class, 'storePaiement'])->name('students.storePaiement');
Route::get('/students/{id}/paiement', [StudentsController::class, 'showPaiement'])->name('students.showPaiement');

// Informations étudiant
Route::get('/students/info', [StudentsController::class, 'info'])->name('students.info');
Route::get('/students/besoin', [StudentsController::class, 'besoin'])->name('students.besoin');




