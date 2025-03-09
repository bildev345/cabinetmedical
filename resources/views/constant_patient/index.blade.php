@extends('layouts.master')
@section('main')

    <div class="container">
        <h2 class="text-center fs-4">Liste des constantes des patients</h2>
        <a href="{{ route('constant_patient.create') }}" class="btn btn-primary">Ajouter une constante</a>

        <!-- @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif -->
        @if (session('success'))
                <script>
                    Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                    });
                </script>
            @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Constante</th>
                    <th>Date</th>
                    <th>Valeur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($constantsPatients as $constant)
                    <tr>
                        <td>{{ $constant->id }}</td>
                        <td>{{ $constant->patient->nom }}</td>
                        <td>{{ $constant->constant->constant }}</td>
                        <td>{{ $constant->date }}</td>
                        <td>{{ $constant->valeur }}</td>
                        <td>
                            <a href="{{ route('constant_patient.edit', $constant->id) }}" class="btn btn-warning">Modifier</a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $constant->id }})">Supprimer</button>
                            <form id="delete-form-{{ $constant->id }}" action="{{ route('constant_patient.destroy', $constant->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(constantId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + constantId).submit();
                }
            });
        }
    </script>
@endsection 

