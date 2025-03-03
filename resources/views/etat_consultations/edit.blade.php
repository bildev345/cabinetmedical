@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Modifier l'État de Consultation</h1>
    <form action="{{ route('etat-consultations.update', $etatConsultation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="etat">État</label>
            <input type="text" name="etat" id="etat" class="form-control" value="{{ $etatConsultation->etat }}" required>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="color" name="couleur" id="couleur" class="form-control" value="{{ $etatConsultation->couleur }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
</div>
@endsection
