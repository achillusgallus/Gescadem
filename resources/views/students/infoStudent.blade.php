@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">liste des élèves avec leur information</h1>

        <!-- Paiements associés -->

            <div class="mb-6 mt-4 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 text-left">Nom</th>
                            <th class="py-2 px-4 text-left">Email</th>
                            <th class="py-2 px-4 text-left">Date de naissance</th>
                            <th class="py-2 px-4 text-left">Niveau</th>
                            <th class="py-2 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($students as $student)
                                @if($student->paiements->isEmpty())
                            <tr>
                                <td class="py-2 px-4 text-center" colspan="8">Aucun paiement trouvé pour cet étudiant.</td>
                            </tr>
                                @endif
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-4">{{ $student->name }}</td>
                                <td class="py-2 px-4">{{ $student->email }}</td>
                                <td class="py-2 px-4">{{ $student->date_of_birth }}</td>
                                <td class="py-2 px-4">{{ $student->level }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('students.showPaiement', $student->id) }}"
                                       class="text-blue-500 hover:underline">Voir les paiements</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>

@endsection


