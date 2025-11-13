@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Soumettre un Besoin</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de soumission de besoin -->
    <form action="{{ route('students.besoin') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Champ Nom -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom de l'étudiant</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                value="{{ old('name') }}" required>
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description du besoin</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Catégorie -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category" id="category"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="">Sélectionnez une catégorie</option>
                <option value="Équipement">Équipement</option>
                <option value="Financement">Financement</option>
                <option value="Formation">Formation</option>
                <option value="Autre">Autre</option>
            </select>
            @error('category')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Soumettre
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
</div>
@endsection
