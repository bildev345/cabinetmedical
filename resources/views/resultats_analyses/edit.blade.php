@extends('layouts.master')

@section('main')
<div class="container mt-4">
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
    <h2 class="text-center mb-4">Modifier le résultat d'analyse</h2>
    <div class="card shadow-lg p-4">
        <form action="{{ route('resultats_analyses.update', $resultatAnalyse) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="analyse_id" class="form-label"> Analyse</label>
                <select class="form-control" name="analyse_id">
                    @foreach ($analyses as $analyse)
                        <option value="{{ $analyse->id }}" {{ $resultatAnalyse->analyse_id == $analyse->id ? 'selected' : '' }}>{{ $analyse->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type_analyse_id" class="form-label">Type d'analyse</label>
                <select class="form-control" name="type_analyse_id">
                    @foreach ($typeAnalyses as $typeAnalyse)
                        <option value="{{ $typeAnalyse->id }}" {{ $resultatAnalyse->type_analyse_id == $typeAnalyse->id ? 'selected' : '' }}>{{ $typeAnalyse->type_analyse }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="resultat" class="form-label">Résultat</label>
                <textarea class="form-control" name="resultat">{{ $resultatAnalyse->resultat }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary"> Sauvegarder les modifications</button>
                <a href="{{ route('resultats_analyses.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection