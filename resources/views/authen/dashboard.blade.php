@extends('layouts.app')
@section('content')
    <main class="p-6">
        <div class="flex justify-around gap-10">
                        <!-- Card Inscriptions -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-semibold mb-4">Inscriptions</h3>
                            <p class="text-3xl font-bold text-blue-600">{{$totalStudents}}</p>
                            <p class="text-gray-600">Total des inscriptions</p>
                        </div>

                        <!-- Card Paiements -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-semibold mb-4">Paiements</h3>
                            <p class="text-3xl font-bold text-green-600">{{ $totalPaiement}}FCFA</p>
                            <p class="text-gray-600">Total des paiements</p>
                        </div>

                        <!-- Card Besoins -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-xl font-semibold mb-4">Besoins</h3>
                            <p class="text-3xl font-bold text-yellow-600">0</p>
                            <p class="text-gray-600">Besoins en attente</p>
                        </div>
                    </div>

                    <div>

    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Liste des Étudiants</h1>
            <button class="bg-blue-500 hover:bg-blue-600, text-white px-4 py-2 rounded-md">
                <a href="{{ route('students.info') }}"
                    class="flex items-center py-2 ">
                    <span class="mx-3">voir tous les étudiants</span>
                </a>
            </button>
        </div>
            <!-- Tableau des étudiants -->
                        <div class="overflow-x-auto mt-4">
                        <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 text-left text-gray-600">Nom</th>
                            <th class="py-3 px-4 text-left text-gray-600">Email</th>
                            <th class="py-3 px-4 text-left text-gray-600">Date de Naissance</th>
                            <th class="py-3 px-4 text-left text-gray-600">Niveau</th>
                            <th class="py-3 px-4 text-left text-gray-600">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $student->name }}</td>
                                <td class="py-3 px-4">{{ $student->email }}</td>
                                <td class="py-3 px-4">{{ $student->date_of_birth }}</td>
                                <td class="py-3 px-4">{{ $student->level }}</td>
                                <td class="py-3 px-4">
                                    <!-- Boutons d'actions (éditer, supprimer) -->
                                    <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:underline">Éditer</a>
                                    <a href="{{ route('students.showPaiement', $student->id) }}" class="text-green-600 hover:underline">
Voir les paiements</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
@endsection
