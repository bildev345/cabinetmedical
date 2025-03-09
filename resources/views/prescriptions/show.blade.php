@extends('layouts.master')

@section('main')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">
        <i class="bi bi-file-medical"></i> Détails de la Prescription
    </h1>

    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Prescription du {{ $prescription->date }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong><i class="bi bi-journal-text"></i> Rapport :</strong> {{ $prescription->rapport }}</p>
            <p class="card-text"><strong><i class="bi bi-calendar-check"></i> Consultation :</strong> {{ $prescription->consultation->date_debut }}</p>

            <h5 class="mt-4"><i class="bi bi-capsule"></i> Médicaments :</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-capsule"></i> Médicament</th>
                            <th><i class="bi bi-card-text"></i> Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescription->medicaments as $medicament)
                        <tr>
                            <td>{{ $medicament->medicament }}</td>
                            <td>{{ $medicament->pivot->note ?? 'Aucune note' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
