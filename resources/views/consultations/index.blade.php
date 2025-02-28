<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Consultations</title>
</head>
<body>
<div class="container">
    <h1>Liste des Consultations</h1>
    <a href="{{ route('consultations.create') }}" class="btn btn-primary mb-3">Créer une Consultation</a>
    
    <a href="{{ route('consultations.calendar') }}" class="btn btn-success mb-3">Voir le Calendrier</a>

    <table class="table table-bordered" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>État</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
                <tr>
                    <td>{{ $consultation->id }}</td>
                    <td>{{ $consultation->patient->nom }} {{ $consultation->patient->prenom }}</td>
                    <td>{{ $consultation->date_debut }}</td>
                    <td>{{ $consultation->date_fin }}</td>
                    <td style="background-color: {{ $consultation->etatConsultation->couleur }};">
                        {{ $consultation->etatConsultation->etat }}
                    </td>
                    <td style="background-color: {{ $consultation->typeConsultation->couleur }};">
                        {{ $consultation->typeConsultation->type_consultation }}
                    </td>
                    <td>
                        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning">Modifier</a>
                        <!-- <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>