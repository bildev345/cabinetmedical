@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Liste des Constants </h1>
        @if(@session('success'))
            <div class="alert alert-success"> {{session('success')}} </div>
            @endif
        <a href="{{ route('constants.create') }}" class="btn btn-primary">Ajouter Constant</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Constant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($constants as $constant)
                    <tr>
                        <td>{{ $constant->id }}</td>
                        <td>{{ $constant->constant }}</td>
                        <td>
                            <a href="{{ route('constants.edit', $constant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('constants.destroy', $constant->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez vous vraiment supprimer l\'enregistrement en cours?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
