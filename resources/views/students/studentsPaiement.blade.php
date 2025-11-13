@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Enregistrement d'un Paiement</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de paiement -->
    <form action="{{ route('students.storePaiement') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Champ Montant -->
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Montant (FCFA)</label>
            <input type="number" name="amount" id="amount"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('amount') }}" required>
            @error('amount')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Méthode de paiement -->
        <div>
            <label for="method" class="block text-sm font-medium text-gray-700">Méthode de paiement</label>
            <select name="method" id="method"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="">Sélectionnez une méthode</option>
                <option value="Espèces">Espèces</option>
                <option value="Virement bancaire">Virement bancaire</option>
                <option value="Carte bancaire">Carte bancaire</option>
                <option value="Mobile money">Mobile money</option>
            </select>
            @error('method')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Date de paiement -->
        <div>
            <label for="payment_date" class="block text-sm font-medium text-gray-700">Date du paiement</label>
            <input type="date" name="payment_date" id="payment_date"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('payment_date') }}" required>
            @error('payment_date')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Étudiant -->
        <div>
            <label for="student_id" class="block text-sm font-medium text-gray-700">Étudiant</label>
            <select name="student_id" id="student_id"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer le paiement
            </button>
        </div>
    </form>

    <!-- Bouton de retour -->
    <div class="mt-6 text-center">
        <a href="{{ route('dashboard') }}"
            class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">
            Retour au tableau de bord
        </a>
    </div>
@endsection
