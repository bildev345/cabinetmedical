@extends('layouts.master')

@section('main')
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container mt-4">
    <h2 class="text-center mb-4">Modifier l'analyse</h2>

    <div class="card shadow-lg p-4">
        <form action="{{ route('analyses.update', $analyse)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="{{ $analyse->date }}">
            </div>

            <div class="mb-3">
                <label for="consultation_id" class="form-label"> Consultation</label>
                <select class="form-control" name="consultation_id">
                    @foreach ($consultations as $consultation)
                        <option value="{{ $consultation->id }}" {{ $analyse->consultation_id == $consultation->id ? 'selected' : '' }}>{{ $consultation->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                <a href="{{ route('analyses.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection