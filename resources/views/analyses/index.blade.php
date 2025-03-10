@extends('layouts.master')

@section('main')

<div class="container mt-4">
    <h2 class="text-center mb-4">Liste des analyses</h2>
    @if (session('success'))
            <div class="alert alert-success">
            <a href="{{ route('analyses.create') }}" class="btn btn-primary mb-3">ajouter une Consultation</a>
    
            <a href="{{ route('type_analyses.index') }}" class="btn btn-success mb-3">Type Analyse</a>

            <a href="{{ route('resultats_analyses.index') }}" class="btn btn-success mb-3">Resultat Analyse</a>

            {{ session('success') }}
            </div>
    @endif

    <div class="d-flex justify-content-start mb-3"> 
        <a href="{{ route('analyses.create') }}" class="btn btn-primary">Ajouter une nouvelle analyse</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Consultation associée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($analyses as $analyse)
                <tr>
                    <td>{{ $analyse->id }}</td>
                    <td>{{ $analyse->date }}</td>
                    <td>{{ $analyse->consultation->id}}</td>
                    <td>
                        <a href="{{ route('analyses.edit', $analyse->id) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('analyses.destroy', $analyse->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection