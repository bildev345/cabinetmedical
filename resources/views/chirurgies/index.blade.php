@extends('layouts.master')

@section('main')
    <div class="container">
        <h1>Liste des Chirurgies</h1>


            {{-- @if(@session('success'))
            <div class="alert alert-success"> {{session('success')}} </div>
            @endif --}}
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




        <a href="{{ route('chirurgies.create') }}" class="btn btn-primary">Ajouter une chirurgie</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Libellé</th>
                    <th>Observation</th>
                    <th>Consultation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chirurgies as $chirurgie)
                    <tr>
                        <td>{{ $chirurgie->id }}</td>
                        <td>{{ $chirurgie->date }}</td>
                        <td>{{ $chirurgie->libelle_chirurgie }}</td>
                        <td>{{ $chirurgie->observation }}</td>
                        <td>{{ $chirurgie->consultation->id ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('chirurgies.edit', $chirurgie->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $chirurgie->id }})">Supprimer</button>

                            <!-- Hidden form that will be submitted -->
                            <form id="delete-form-{{ $chirurgie->id }}" action="{{ route('chirurgies.destroy', $chirurgie->id) }}" method="POST" style="display: none;">
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
        function confirmDelete(chirurgieId) {
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
                    document.getElementById("delete-form-" + chirurgieId).submit();
                }
            });
        }
    </script>
    {{-- return confirm('Voulez vous vraiment supprimer l\'enregistrement en cours?') --}}
@endsection
