@extends('layouts.master')

@section('main')
<div class="container">
    <h2>🔬 Détails de l'analyse</h2>
    <table class="table table-bordered">
        <tr><th>Date</th><td>{{ $analyse->date }}</td></tr>
        <tr><th>Type d'analyse</th><td>{{ $analyse->type->type_analyse }}</td></tr>
        <tr><th>Résultat</th><td>{{ $analyse->resultat }}</td></tr>
        <tr><th>Consultation associée</th><td>Consultation n° {{ $analyse->consultation_id }}</td></tr>
    </table>
    <a href="{{ route('analyses.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
