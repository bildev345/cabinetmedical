<!-- resources/views/patients/show.blade.php -->
@extends('layouts.master')

@section('title', 'Détails du Patient')

@section('main')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">
        <i class="bi bi-person-circle"></i> Détails du Patient
    </h1>

    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-person"></i> {{ $patient->nom }} {{ $patient->prenom }}</h5>
        </div>
        <div class="card-body">
            <p><strong><i class="bi bi-calendar"></i> Date de naissance :</strong> {{ $patient->date_naissance }}</p>
            <p><strong><i class="bi bi-telephone"></i> Téléphone :</strong> {{ $patient->telephone }}</p>

            <h5 class="mt-4"><i class="bi bi-heart-pulse"></i> Constantes :</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-clipboard"></i> Type</th>
                            <th><i class="bi bi-calendar-check"></i> Date</th>
                            <th><i class="bi bi-speedometer2"></i> Valeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->constants as $constant)
                        <tr>
                            <td>{{ $constant->nom }}</td>
                            <td>{{ $constant->pivot->date }}</td>
                            <td>{{ $constant->pivot->valeur }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
