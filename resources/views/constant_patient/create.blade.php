
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

    <h2 class="text-center fs-4">Ajouter constante de patient</h2>

    <form action="{{ route('constant_patient.store') }}" method="POST" id="constantForm">
        @csrf
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                @endforeach
            </select>
            <div>
                <a href="{{ route('patients.create') }}" class="btn btn-primary">Ajouter un patient</a>
            </div>
        </div>

        <div class="mb-3">
            <label for="constant_id" class="form-label">Constante</label>
            <select name="constant_id" id="constant_id" class="form-control">
                @foreach($constants as $constant)
                    <option value="{{ $constant->id }}">{{ $constant->constant }}</option>
                @endforeach
            </select>
            <div>
                <a href="{{ route('constants.create') }}" class="btn btn-primary">Ajouter une constante</a>
            </div>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="valeur" class="form-label">Valeur</label>
            <input type="text" name="valeur" id="valeur" class="form-control" value='valeur'>
        </div>

        <button type="sumbit" class="btn btn-success" id="saveBtn">Enregistrer</button>
        <a href="{{ route('constant_patient.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection

