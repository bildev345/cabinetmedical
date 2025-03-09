@extends('layouts.master')

@section('main')
    <div class="container">
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>  
    @endif
        <h2 class="text-center fs-4">Modifier Constant</h2>
        <form action="{{ route('constants.update', $constant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="constant" class="form-label">Constant Nom</label>
                <input type="text" name="constant" class="form-control" value="{{ $constant->constant }}" required>
            </div>
            <button type="submit" class="btn btn-success">mettre à jour</button>
            <a href="{{ route('constants.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

