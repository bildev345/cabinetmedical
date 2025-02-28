
<div class="container">
    <h1>Créer une Consultation</h1>
    <form action="{{ route('consultations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="etat_consultation_id">État de la Consultation</label>
            <select name="etat_consultation_id" id="etat_consultation_id" class="form-control" required>
                @foreach($etatConsultations as $etat)
                    <option value="{{ $etat->id }}">{{ $etat->etat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type_consultation_id">Type de Consultation</label>
            <select name="type_consultation_id" id="type_consultation_id" class="form-control" required>
                @foreach($typeConsultations as $type)
                    <option value="{{ $type->id }}">{{ $type->type_consultation }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rapport">Rapport</label>
            <textarea name="rapport" id="rapport" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="gratuit">Gratuit</label>
            <input type="checkbox" name="gratuit" id="gratuit" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
