@extends('layouts.master')

@section('main')
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
    <h2 class="text-center mb-4">Ajouter un nouveau résultat d'analyse</h2>

    <div class="card shadow-lg p-4">
        <form action="{{ route('resultats_analyses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="analyse_id" class="form-label">Analyse</label>
                <select class="form-control" name="analyse_id">
                    <option value="">-- Sélectionner une analyse --</option>
                    @foreach ($analyses as $analyse)
                        <option value="{{ $analyse->id }}">{{ $analyse->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="type_analyse_id" class="form-label">Type d'analyse</label>
                <select class="form-control" name="type_analyse_id">
                    <option value="">-- Sélectionner un type d'analyse --</option>
                    @foreach ($typeAnalyses as $typeAnalyse)
                        <option value="{{ $typeAnalyse->id }}">{{ $typeAnalyse->type_analyse }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="resultat" class="form-label"> Résultat</label>
                <textarea class="form-control" name="resultat"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success"> Sauvegarder</button>
                <a href="{{ route('resultats_analyses.index') }}" class="btn btn-secondary"> Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection