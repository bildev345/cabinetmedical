@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Créer un Type de Consultation</h1>
    <form action="{{ route('type-consultations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type_consultation">Type de Consultation</label>
            <input type="text" name="type_consultation" id="type_consultation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="color" name="couleur" id="couleur" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
