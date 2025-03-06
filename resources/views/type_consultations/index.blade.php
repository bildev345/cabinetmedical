<!-- resources/views/type_consultations/index.blade.php -->
@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Liste des Types de Consultation</h1>
    <div>
    <a href="{{ route('type-consultations.create') }}" class="btn btn-primary mb-3">Créer un Type</a>

    <a href="{{ route('consultations.index') }}" class="btn btn-primary mb-3"> Consultations</a>
    </div>
    <br/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type de Consultation</th>
                <th>Couleur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeConsultations as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->type_consultation }}</td>
                    <td style="background-color: {{ $type->couleur }};">{{ $type->couleur }}</td>
                    <td>
                        <a href="{{ route('type-consultations.edit', $type->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('type-consultations.destroy', $type->id) }}" method="POST" style="display:inline;">
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
