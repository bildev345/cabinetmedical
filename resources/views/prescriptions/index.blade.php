@extends('layouts.master')
@section('main')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('update'))
    <div class="alert alert-primary">
        {{ session('update') }}
    </div>
    @endif
    @if (session('destroy'))
    <div class="alert alert-danger">
        {{ session('destroy') }}
    </div>
    @endif
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Liste des Prescriptions</h1>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('prescriptions.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Ajouter une Prescription
        </a>
        <div>
            <input type="text" class="form-control" placeholder="Recherche..." id="searchPrescription">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Date</th>
                    <th>Rapport</th>
                    <th>Consultation ID</th>
                    <th>Médicaments</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prescriptions as $prescription)
                    <tr>
                        <td>{{ $prescription->date }}</td>
                        <td>{{ $prescription->rapport }}</td>
                        <td>{{ $prescription->consultation_id }}</td>
                        <td>
                            @foreach ($prescription->medicaments as $medicament)
                                <div>{{ $medicament->medicament }}</div>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($prescription->medicaments as $medicament)
                                <div>
                                    <span class="badge bg-info">
                                        {{ $medicament->pivot->note ? $medicament->pivot->note : 'Aucune note' }}
                                    </span>
                                </div>
                            @endforeach
                        </td>
                        <td class="text-end">
                            <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> ✏️
                            </a>
                            <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette prescription ?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> 🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('searchPrescription').addEventListener('input', function() {
        let searchValue = this.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(row => {
            let rowText = row.innerText.toLowerCase();
            if (rowText.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
