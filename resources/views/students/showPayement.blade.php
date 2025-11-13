@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 mt-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Détails de l'Étudiant</h1>

        <p><strong>Nom :</strong> {{ $student->name }}</p>
        <p><strong>Email :</strong> {{ $student->email }}</p>

        <h2 class="text-xl font-semibold text-gray-700 mt-6">Paiements</h2>
        @if($student->paiements->isEmpty())
            <p class="text-gray-500">Aucun paiement enregistré.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($student->paiements as $paiement)
                    <li>
                        <strong>Montant :</strong> {{ $paiement->amount }} FCFA<br>
                        <strong>Méthode :</strong> {{ $paiement->method }}<br>
                        <strong>Date :</strong> {{ $paiement->payment_date }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
