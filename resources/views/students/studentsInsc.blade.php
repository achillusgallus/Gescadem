@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Inscription d'un Étudiant</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire d'inscription -->
    <form action="{{ route('students.storeInscription') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Champ Nom -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('name') }}" required>
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('email') }}" required>
            @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Mot de passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Date de naissance -->
        <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date de naissance</label>
            <input type="date" name="date_of_birth" id="date_of_birth"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('date_of_birth') }}" required>
            @error('date_of_birth')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Niveau d'étude -->
        <div>
            <label for="level" class="block text-sm font-medium text-gray-700">Niveau d'étude</label>
            <select name="level" id="level"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="">Sélectionnez un niveau</option>
                <option value="Licence 1">Licence 1</option>
                <option value="Licence 2">Licence 2</option>
                <option value="Licence 3">Licence 3</option>
                <option value="Master 1">Master 1</option>
                <option value="Master 2">Master 2</option>
            </select>
            @error('level')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enregistrer
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
