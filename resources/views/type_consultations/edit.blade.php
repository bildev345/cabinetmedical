@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Modifier le Type de Consultation</h1>
    <form action="{{ route('type-consultations.update', $typeConsultation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type_consultation">Type de Consultation</label>
            <input type="text" name="type_consultation" id="type_consultation" class="form-control" value="{{ $typeConsultation->type_consultation }}" required>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="color" name="couleur" id="couleur" class="form-control" value="{{ $typeConsultation->couleur }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
</div>
@endsection
