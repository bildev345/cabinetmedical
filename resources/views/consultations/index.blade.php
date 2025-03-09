@extends('layouts.master')
@section('main')
<div class="container">
    <div>
    <h1>Liste des Consultations</h1>
    <a href="{{ route('consultations.create') }}" class="btn btn-primary mb-3">Créer une Consultation</a>
    
    <a href="{{ route('consultations.calendar') }}" class="btn btn-success mb-3">Voir le Calendrier</a>

    <a href="{{ route('etat-consultations.index') }}" class="btn btn-success mb-3">Etat Consultations</a>

    <a href="{{ route('type-consultations.index') }}" class="btn btn-success mb-3">Type Consultations</a>
    </div>
    <br/>
    <table class="table table-bordered" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>État</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->patient->nom }} {{ $consultation->patient->prenom }}</td>
                    <td>{{ $consultation->date_debut }}</td>
                    <td>{{ $consultation->date_fin }}</td>
                    <td style="background-color: {{ $consultation->etatConsultation->couleur }};">
                        {{ $consultation->etatConsultation->etat }}
                    </td>
                    <td style="background-color: {{ $consultation->typeConsultation->couleur }}
                    ;">
                        {{ $consultation->typeConsultation->type_consultation }}
                    </td>
                    <td>
                        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette consultation ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection