@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Liste des États de Consultation</h1>
    <div>
    <a href="{{ route('etat-consultations.create') }}" class="btn btn-primary mb-3">Créer un État</a>
    
    <a href="{{ route('consultations.index') }}" class="btn btn-primary mb-3">Consultations</a>
    </div>
    <br/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>État</th>
                <th>Couleur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etatConsultations as $etat)
                <tr>
                    <td>{{ $etat->id }}</td>
                    <td>{{ $etat->etat }}</td>
                    <td style="background-color: {{ $etat->couleur }};">{{ $etat->couleur }}</td>
                    <td>
                        <a href="{{ route('etat-consultations.edit', $etat->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('etat-consultations.destroy', $etat->id) }}" method="POST" style="display:inline;">
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