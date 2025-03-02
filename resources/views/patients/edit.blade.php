@extends('layouts.master')

@section('title', 'Modifier Patient')

@section('main')
<div class="container">
    <h1 class="text-center my-4">Modifier Patient</h1>

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $patient->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ $patient->prenom }}" required>
        </div>
        <div class="mb-3">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" name="cin" class="form-control" value="{{ $patient->cin }}" required>
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ $patient->date_naissance }}" required>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" class="form-control" value="{{ $patient->ville }}" required>
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" name="tel" class="form-control" value="{{ $patient->tel }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Sexe</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="sexeMale" value="Male" {{ $patient->sexe == 'Male' ? 'checked' : '' }} required>
                <label class="form-check-label" for="sexeMale">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="sexeFemelle" value="Femelle" {{ $patient->sexe == 'Femelle' ? 'checked' : '' }} required>
                <label class="form-check-label" for="sexeFemelle">Femelle</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="taille" class="form-label">Taille</label>
            <input type="text" name="taille" class="form-control" value="{{ $patient->taille }}" required>
        </div>
        <div class="mb-3">
            <label for="poids" class="form-label">Poids</label>
            <input type="text" name="poids" class="form-control" value="{{ $patient->poids }}" required>
        </div>
        <div class="mb-3">
            <label for="groupe_sangin" class="form-label">Groupe Sanguin</label>
            <input type="text" name="groupe_sangin" class="form-control" value="{{ $patient->groupe_sangin }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Assuré</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="assure" id="assureOui" value="1" {{ $patient->assure ? 'checked' : '' }} required>
                <label class="form-check-label" for="assureOui">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="assure" id="assureNon" value="0" {{ !$patient->assure ? 'checked' : '' }} required>
                <label class="form-check-label" for="assureNon">Non</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
