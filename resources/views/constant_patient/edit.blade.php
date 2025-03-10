
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
        <h2 class="text-center fs-4">Modifier constant de patient</h2>
        <form action="{{ route('constant_patient.update', $constantPatient->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select name="patient_id" id="patient_id" class="form-control" >
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $constantPatient->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->nom }}
                        </option>
                    @endforeach
                </select>
                <div>
                    <a href="{{ route('patients.create', $patient->id) }}" class="btn btn-primary">Ajouter une patient</a>
                </div>
            </div>
            <div class="mb-3">
                <label for="constant_id" class="form-label">Constante</label>
                <select name="constant_id" id="constant_id" class="form-control" >
                    @foreach($constants as $constant)
                        <option value="{{ $constant->id }}" {{ $constantPatient->constant_id == $constant->id ? 'selected' : '' }}>
                            {{ $constant->constant }}
                        </option>
                    @endforeach
                </select>
                <div>
                    <a href="{{ route('constants.create', $constant->id) }}" class="btn btn-primary">Ajouter un constant</a>
                </div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $constantPatient->date }}" >
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Valeur</label>
                <input type="text" name="valeur" id="valeur" class="form-control" value="{{ $constantPatient->valeur }}" >
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('constant_patient.index') }}" class="btn btn-secondary">Annuler</a>
            <div>
            
            </div>
        </form>
    </div>
@endsection
 
