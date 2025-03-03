@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Créer un État de Consultation</h1>
    <form action="{{ route('etat-consultations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="etat">État</label>
            <input type="text" name="etat" id="etat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="color" name="couleur" id="couleur" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection