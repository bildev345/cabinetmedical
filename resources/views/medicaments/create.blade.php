@extends('layouts.master')
@section('main')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4 text-green-900">Ajouter un médicament</h1>
        <form action="{{ route('medicaments.store') }}" method="POST" class="bg-green-50 p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">

                <label for="medicament" class="block mb-1 text-green-800">Médicament:</label>
                <input type="text" name="medicament" id="medicament" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('medicament') border-red-500 @enderror" value="{{ old('medicament') }}" required>
                @error('medicament')

                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-800 transition duration-300">Ajouter</button>
                <a href="{{ route('prescriptions.index') }}" class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 transition duration-300">Retour aux prescriptions</a>
            </div>
        </form>

        <table class="min-w-full bg-white border border-green-300 mt-6 rounded-lg overflow-hidden shadow-md">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="border border-green-300 px-4 py-2">Médicament</th>
                    <th class="border border-green-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicaments as $medicament)
                    <tr class="hover:bg-green-50 transition duration-200">
                        <td class="border border-green-300 px-4 py-2">{{ $medicament->medicament }}</td>
                        <td class="border border-green-300 px-4 py-2">
                            <a href="{{ route('medicaments.edit', $medicament) }}" class="text-yellow-600 hover:text-yellow-700 mr-2 px-2">Modifier</a>

                            {{-- Formulaire de suppression du médicament (optionnel) --}}
                            {{-- <form action="{{ route('medicaments.destroy', $medicament) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">Supprimer</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
