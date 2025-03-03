@extends('layouts.master')

@section('main')

    <div class="mx-auto p-4">

        <h1 class="text-4xl font-bold mb-4 text-green-900">Modifier le medicament '{{ $medicament->medicament }}'</h1>  <!-- استخدم 'medicament' هنا -->

        <form action="{{ route('medicaments.update', $medicament) }}" method="POST" class="bg-green-50 p-6 rounded-lg shadow-md">

            @csrf

            @method('PUT')

            <div class="mb-4">

                <label for="medicament" class="block mb-1 text-green-800">Le nouveau medicament:</label> <!-- استخدم 'medicament' هنا -->

                <input type="text" name="medicament" id="medicament" class="border border-green-300 p-2 w-full rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('medicament') border-red-500 @enderror" value="{{ old('medicament', $medicament->medicament) }}" required>  <!-- استخدم 'medicament' هنا -->

                @error('medicament')

                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>

                @enderror

            </div>

            <div class="flex items-center gap-2">

                <button type="submit" class="bg-green-700 text-white p-2 rounded-lg hover:bg-green-800 transition duration-300">Modifier</button>

                <a href="{{ route('prescriptions.index') }}" class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 transition duration-300">prescription</a>

            </div>

        </form>

    </div>

@endsection
