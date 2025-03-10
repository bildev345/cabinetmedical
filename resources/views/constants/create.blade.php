@extends('layouts.master')

@section('main')
    <div class="container">
 
        <h2 class="text-center fs-4">Ajouter Constant</h2>
        <form action="{{ route('constants.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="constant" class="form-label">Constant Nom</label>
                <input type="text" name="constant" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a href="{{ route('constants.index') }}" class="btn btn-secondary">Annuler</a>
           
        </form>
    </div>
@endsection
