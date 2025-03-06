@extends('layouts.master')

@section('title', 'Ajouter un Patient')

@section('main')

<div class="container">
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>  
    @endif
    <h1 class="text-center my-4">Ajouter un Patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" name="cin" class="form-control">
        </div>
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de naissance</label>
            <input type="date" name="date_naissance" class="form-control">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" name="adresse" class="form-control">
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" name="tel" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Sexe</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" value="M">
                <label class="form-check-label">Masculin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" value="F">
                <label class="form-check-label">Féminin</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="taille" class="form-label">Taille (cm)</label>
            <input type="number" name="taille" class="form-control">
        </div>
        <div class="mb-3">
            <label for="poids" class="form-label">Poids (kg)</label>
            <input type="number" name="poids" class="form-control">
        </div>
        <div class="mb-3">
            <label for="groupe_sangin" class="form-label">Groupe Sanguin</label>
            <input type="text" name="groupe_sangin" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Assuré</label>
            <div class="form-check form-check-inline">
                <input type="hidden" name="assure" value="0"> 
                <input class="form-check-input" type="radio" name="assure" value="1">
                <label class="form-check-label">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="assure" value="0">
                <label class="form-check-label">Non</label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
