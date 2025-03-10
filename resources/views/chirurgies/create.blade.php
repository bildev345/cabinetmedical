@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Ajouter une chirurgie</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('chirurgies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="libelle_chirurgie" class="form-label">Libellé</label>
                <input type="text" name="libelle_chirurgie" class="form-control">
            </div>
            <div class="mb-3">
                <label for="observation" class="form-label">Observation</label>
                <textarea name="observation" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="consultation_id" class="form-label">Consultation</label>
                <select name="consultation_id" class="form-control">
                    @foreach($consultations as $consultation)
                        <option value="{{ $consultation->id }}">{{ $consultation->id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('chirurgies.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
