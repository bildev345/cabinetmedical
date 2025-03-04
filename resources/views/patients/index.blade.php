@extends('layouts.master')

@section('title', 'Liste des Patients')

@section('main')
<div class="container">
    @if (session("success"))
    <div class="alert alert-success">{{session("success")}}</div> 
    @endif
    <h1 class="text-center my-4">Liste des Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Ajouter un Patient</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Date de naissance</th>
                <th>Ville</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Taille</th>
                <th>Poids</th>
                <th>Groupe Sanguin</th>
                <th>Assuré</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ $patient->prenom }}</td>
                    <td>{{ $patient->cin }}</td>
                    <td>{{ $patient->date_naissance }}</td>
                    <td>{{ $patient->ville }}</td>
                    <td>{{ $patient->tel }}</td>
                    <td>{{ $patient->sexe }}</td>
                    <td>{{ $patient->taille }}</td>
                    <td>{{ $patient->poids }}</td>
                    <td>{{ $patient->groupe_sangin }}</td>
                    <td>{{ $patient->assure ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
