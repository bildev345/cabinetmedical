@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container mt-4">
    <h2 class="text-center mb-4">Ajouter un nouveau type d'analyse</h2>

    <div class="card shadow-lg p-4">
        <form action="{{ route('type_analyses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="type_analyse" class="form-label">Nom de l'analyse</label>
                <input type="text" class="form-control" name="type_analyse">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Sauvegarder</button>
                <a href="{{ route('type_analyses.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection