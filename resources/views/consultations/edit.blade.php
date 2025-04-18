
@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Modifier la Consultation</h1>
    <form action="{{ route('consultations.update', $consultation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" value="{{ $consultation->date_debut }}" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" value="{{ $consultation->date_fin }}" required>
        </div>
        <div class="form-group">
            <label for="etat_consultation_id">État de la Consultation</label>
            <select name="etat_consultation_id" id="etat_consultation_id" class="form-control" required>
                @foreach($etatConsultations as $etat)
                    <option value="{{ $etat->id }}" {{ $consultation->etat_consultation_id == $etat->id ? 'selected' : '' }}>
                        {{ $etat->etat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $consultation->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->nom }} {{ $patient->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type_consultation_id">Type de Consultation</label>
            <select name="type_consultation_id" id="type_consultation_id" class="form-control" required>
                @foreach($typeConsultations as $type)
                    <option value="{{ $type->id }}" {{ $consultation->type_consultation_id == $type->id ? 'selected' : '' }}>
                        {{ $type->type_consultation }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rapport">Rapport</label>
            <textarea name="rapport" id="rapport" class="form-control">{{ $consultation->rapport }}</textarea>
        </div>
        <div class="form-group">
            <div>
                <label for="gratuit">Gratuit : </label>
                <label>
                    <input type="radio" name="gratuit" value="1" {{ $consultation->gratuit ? 'checked' : '' }}> Oui
                </label>
                <label>
                    <input type="radio" name="gratuit" value="0" {{ !$consultation->gratuit ? 'checked' : '' }}> Non
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
</div>
@endsection