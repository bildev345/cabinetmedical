@extends('layouts.master')
@section('main')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Créer une Nouvelle Prescription</h1>

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

    <form action="{{ route('prescriptions.store') }}" method="POST">
        @csrf

        {{-- Champ Date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        {{-- Champ Rapport --}}
        <div class="mb-3">
            <label for="rapport" class="form-label">Rapport:</label>
            <textarea name="rapport" class="form-control" rows="4" required>{{ old('rapport') }}</textarea>
        </div>

        {{-- Sélection de la consultation associée --}}
        <div class="mb-3">
            <label for="consultation_id" class="form-label">Consultation:</label>
            <select name="consultation_id" class="form-select" required>
                <option value="">Sélectionnez une consultation</option>
                @foreach ($consultations as $consultation)
                    <option value="{{ $consultation->id }}" {{ old('consultation_id') == $consultation->id ? 'selected' : '' }}>
                        Consultation #{{ $consultation->id }} - {{ $consultation->date_debut }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sélection des médicaments (multiple) --}}
        
        <div class="mb-4">
    <label for="medicament_id" class="block mb-1 text-green-800">Médicaments:</label>
    <select name="medicament_id[]" id="medicament_id" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('medicament_id') border-red-500 @enderror" multiple>
        @foreach ($medicaments as $medicament)
            <option value="{{ $medicament->id }}" {{ in_array($medicament->id, old('medicament_id', [])) ? 'selected' : '' }}>{{ $medicament->medicament }}</option>
        @endforeach
    </select>
    @error('medicament_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <button type="button" class="bg-green-700 text-white p-2 rounded-lg mt-2 hover:bg-green-800 transition duration-300" onclick="window.location.href='{{ route('medicaments.create') }}'">Ajouter un médicament</button>
</div>
            <!-- Champ Note pour chaque médicament -->
             <div class="mb-3">
    <label for="note">Note (optionnelle):</label>
    <input type="text" name="note[]" placeholder="Entrez une note" class="form-control">
</div>

        {{-- Bouton d'enregistrement --}}
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

    {{-- Lien pour retourner à la liste des prescriptions --}}
    <div class="mt-3">
        <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection
