@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4"> Liste des types d'analyses</h2>
    @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('type_analyses.create') }}" class="btn btn-primary"> Ajouter un nouveau type d'analyse</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nom de l'analyse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($type_analyses as $typeAnalyse)
                <tr>
                    <td>{{ $typeAnalyse->id}}</td>
                    <td>{{ $typeAnalyse->type_analyse }}</td>
                    <td>
                        <a href="{{ route('type_analyses.edit', $typeAnalyse->id) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('type_analyses.destroy', $typeAnalyse->id) }}" method="POST" class="d-inline">
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