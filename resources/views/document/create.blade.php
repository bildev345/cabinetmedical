@extends('layouts.master')
@section('main')
    <div class="mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4 text-green-900">Ajouter un document</h1>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="bg-green-50 p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="date" class="block mb-1 text-green-800">Date:</label>
                <input type="date" name="date" id="date" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('date') border-red-500 @enderror" value="{{ old('date') }}">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="rapport" class="block mb-1 text-green-800">Rapport:</label>
                <textarea name="rapport" id="rapport" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('rapport') border-red-500 @enderror">{{ old('rapport') }}</textarea>
                @error('rapport')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="fichier" class="block mb-1 text-green-800">Document (any type):</label>
                <input type="file" name="fichier" id="fichier" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('fichier') border-red-500 @enderror">
                @error('fichier')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="type_document_id" class="block mb-1 text-green-800">Le type de document:</label>
                <select name="type_document_id" id="type_document_id" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('type_document_id') border-red-500 @enderror">
                    @foreach ($typeDocuments as $type)
                        <option value="{{ $type->id }}" {{ old('type_document_id') == $type->id ? 'selected' : '' }}>{{ $type->type_document }}</option>
                    @endforeach
                </select>
                @error('type_document_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button type="button" class="bg-green-700 text-white p-2 rounded-lg mt-2 hover:bg-green-800 transition duration-300" onclick="window.location.href='{{ route('type_documents.create') }}'">Ajouter un type</button>
            </div>
            <div class="mb-4">
                <label for="patient_id" class="block mb-1 text-green-800">Patient:</label>
                <select name="patient_id" id="patient_id" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('patient_id') border-red-500 @enderror">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->nom }} {{ $patient->prenom }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-800 transition duration-300">Ajouter</button>
                <a href="{{ route('documents.index') }}" class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 transition duration-300">Annuler</a>
            </div>
        </form>
    </div>
@endsection