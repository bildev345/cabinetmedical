@extends('layouts.master')

@section('msin')
<div class="container mt-4">
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                 <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <h2 class="text-center mb-4">Liste des résultats d'analyses</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('resultats_analyses.create') }}" class="btn btn-primary">Ajouter un nouveau résultat</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Analyse</th>
                <th>Type</th>
                <th>Résultat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultats_analyses as $resultat)
                <tr>
                    <td>{{ $resultat->id }}</td>
                    <td>{{ $resultat->analyse->id }}</td>
                    <td>{{ $resultat->type_analyse->type_analyse }}</td>
                    <td>{{ $resultat->resultat }}</td>
                    <td>
                        <a href="{{ route('resultats_analyses.edit', $resultat->id) }}" class="btn btn-warning btn-sm">✏ Modifier</a>
                        <form action="{{ route('resultats_analyses.destroy', $resultat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">🗑 Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection