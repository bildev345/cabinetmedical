@extends('layouts.master')

@section('title', 'Liste des Patients')

@section('main')
<div class="container">
    <!-- @if (session("success"))
    <div class="alert alert-success">{{session("success")}}</div> 
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
    <h1 class="text-center my-4">Liste des Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Ajouter un Patient</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Date de naissance</th>
                <th>Ville</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Taille</th>
                <th>Poids</th>
                <th>Groupe Sanguin</th>
                <th>Assuré</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ $patient->prenom }}</td>
                    <td>{{ $patient->cin }}</td>
                    <td>{{ $patient->date_naissance }}</td>
                    <td>{{ $patient->ville }}</td>
                    <td>{{ $patient->tel }}</td>
                    <td>{{ $patient->sexe }}</td>
                    <td>{{ $patient->taille }}</td>
                    <td>{{ $patient->poids }}</td>
                    <td>{{ $patient->groupe_sangin }}</td>
                    <td>{{ $patient->assure ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $patient->id }})">Supprimer</button>
                        <form id="delete-form-{{ $patient->id }}" action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('constant_patient.index') }}" class="btn btn-primary"> Voir constantes</a>
        <a href="{{ route('constant_patient.create') }}" class="btn btn-primary"> <-Retour</a>
        </div>
</div>
<script>
        function confirmDelete(patientId) {
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
                    document.getElementById("delete-form-" + patientId).submit();
                }
            });
        }
    </script>
@endsection 

