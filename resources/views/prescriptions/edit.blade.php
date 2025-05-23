@extends('layouts.master')
@section('main')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Modifier la Prescription</h1>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Champ Date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $prescription->date) }}" required>
        </div>

        {{-- Champ Rapport --}}
        <div class="mb-3">
            <label for="rapport" class="form-label">Rapport:</label>
            <textarea name="rapport" class="form-control" rows="4" required>{{ old('rapport', $prescription->rapport) }}</textarea>
        </div>

        {{-- Sélection de la consultation associée --}}
        <div class="mb-3">
            <label for="consultation_id" class="form-label">Consultation:</label>
            <select name="consultation_id" class="form-select" required>
                <option value="">Sélectionnez une consultation</option>
                @foreach ($consultations as $consultation)
                    <option value="{{ $consultation->id }}" {{ old('consultation_id', $prescription->consultation_id) == $consultation->id ? 'selected' : '' }}>
                        Consultation #{{ $consultation->id }} - {{ $consultation->date_debut }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sélection des médicaments (multiple) --}}
        <div class="mb-3">
            <label for="medicaments" class="form-label">Médicaments:</label>
            <select name="medicaments[]" class="form-select" multiple required>
                @foreach ($medicaments as $medicament)
                    <option value="{{ $medicament->id }}" {{ (collect(old('medicaments', $prescription->medicaments->pluck('id')))->contains($medicament->id)) ? 'selected' : '' }}>
                        {{ $medicament->medicament }}
                    </option>
                @endforeach
            </select><br>
            <!-- Champ Note pour chaque médicament -->
    <label for="note">Note (optionnelle):</label>
    <input type="text" name="note[]" placeholder="Entrez une note" class="form-control">
        </div>

        {{-- Bouton d'enregistrement --}}
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>

    {{-- Lien pour retourner à la liste des prescriptions --}}
    <div class="mt-3">
        <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
