@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Modifier Constant</h1>
        <form action="{{ route('constants.update', $constant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="constant" class="form-label">Constant Nom</label>
                <input type="text" name="constant" class="form-control" value="{{ $constant->constant }}" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('constants.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

