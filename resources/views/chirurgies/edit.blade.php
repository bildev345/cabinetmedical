@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Modifier la chirurgie</h1>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('chirurgies.update', $chirurgie->id) }}" method="POST">
                        @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $chirurgie->date }}" >
            </div>
            <div class="mb-3">
                <label for="libelle_chirurgie" class="form-label">Libellé</label>
                <input type="text" name="libelle_chirurgie" class="form-control" value="{{ $chirurgie->libelle_chirurgie }}" >
            </div>
            <div class="mb-3">
                <label for="observation" class="form-label">Observation</label>
                <textarea name="observation" class="form-control">{{ $chirurgie->observation }}</textarea>
            </div>
            <div class="mb-3">
                <label for="consultation_id" class="form-label">Consultation</label>
                <select name="consultation_id" class="form-control" required>
                    @foreach($consultations as $consultation)
                        <option value="{{ $consultation->id }}" {{ $chirurgie->consultation_id == $consultation->id ? 'selected' : '' }}>
                            {{ $consultation->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('chirurgies.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection
