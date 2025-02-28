@extends('layouts.master')
@section('main')
    <div class="mx-auto p-4 bg-gray-50 min-h-screen">
        <h1 class="text-4xl font-bold mb-4 text-green-800">Documents Médicaux</h1>

        <form method="GET" action="{{ route('documents.index') }}" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" placeholder="Rechercher par nom/prénom patient" 
                       value="{{ request('search') }}"
                       class="flex-1 p-2 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    🔍 Rechercher
                </button>
                @if(request('search'))
                    <a href="{{ route('documents.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                        ↻ Réinitialiser
                    </a>
                @endif
            </div>
        </form>

        @if($error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ $error }}</div>
        @endif
        @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('message') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
        @endif

        <div class="flex gap-4 mb-6">
            <a href="{{ route('documents.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                📤 Nouveau Document
            </a>
            <a href="{{ route('type_documents.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                ➕ Nouveau Type
            </a>
        </div>

        @if (session('successType'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('successType') }}</div>
        @endif
        @if (session('errorType'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ session('errorType') }}</div>
        @endif

        <div class="border border-green-200 rounded-lg overflow-hidden shadow-sm">
            <table class="min-w-full">
                <thead class="bg-green-700 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Patient</th>
                        <th class="py-3 px-4 text-left">Date</th>
                        <th class="py-3 px-4 text-left">Rapport</th>
                        <th class="py-3 px-4 text-left">Type</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-green-100">
                    @foreach ($groupedDocuments as $patientId => $documentsGroup)
                        @foreach ($documentsGroup as $document)
                            <tr class="hover:bg-green-50 transition-colors">
                                @if($loop->first)
                                    <td class="py-3 px-4 border-r border-green-100" rowspan="{{ $documentsGroup->count() }}">
                                        <span class="font-medium text-green-800">
                                            {{ $document->patient->prenom }} {{ $document->patient->nom }}
                                        </span>
                                    </td>
                                @endif
                                <td class="py-3 px-4 text-green-700">
                                    @php
                                        $date = strtotime($document->date);
                                        $days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
                                        $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                                    @endphp
                                    {{ $days[date('w', $date)] }}<br>
                                    <span class="text-sm text-green-600">
                                        {{ date('d', $date) }} {{ $months[date('n', $date) - 1] }} {{ date('Y', $date) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-green-800">{{ $document->rapport }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-md">
                                        {{ $document->typeDocument->type_document }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 space-x-3">
                                    <a href="{{ route('documents.edit', $document) }}" class="text-green-600 hover:text-green-800" title="Modifier">
                                        ✏️
                                    </a>
                                    <a href="{{ route('documents.download', $document) }}" class="text-green-600 hover:text-green-800" title="Télécharger">
                                        ⬇️
                                    </a>
                                    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document?')" title="Supprimer">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $documents->links('pagination::tailwind') }}
        </div>
    </div>
@endsection