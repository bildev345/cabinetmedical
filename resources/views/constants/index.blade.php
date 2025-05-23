@extends('layouts.master')

@section('main')
    <div class="container">
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
        <h2 class="text-center fs-4">Liste des Constants </h2>
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
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $constant->id }})">Supprimer</button>
                            <form id="delete-form-{{ $constant->id }}" action="{{ route('constants.destroy', $constant->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        <a href="{{ route('constant_patient.create') }}" class="btn btn-primary"><-Retour</a>
        </div>
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
