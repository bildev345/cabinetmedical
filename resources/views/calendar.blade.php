@extends('layouts.master')
@section('main')

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
        <br/>
        <a href="{{ route('consultations.index') }}" class="btn btn-primary mb-3"> Consultations</a>
        <h1>Calendrier des Consultations</h1>
        </div>
    </div>
    
    <div id="calendar"></div>
</div>

<!-- Modal de création -->
<div class="modal fade" id="createConsultationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvelle Consultation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createConsultationForm" method="POST" action="{{ route('consultations.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Date de début</label>
                                <input type="datetime-local" name="date_debut" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Date de fin</label>
                                <input type="datetime-local" name="date_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ajoutez ici les autres champs du formulaire -->
                    <div class="mb-3">
                        <label>Patient</label>
                        <select name="patient_id" class="form-select" required>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- ... autres champs ... -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            events: "{{ route('list') }}",
            selectable: true,
            select: function(info) {
                // Création via sélection calendrier
                openModal({
                    date_debut: info.startStr,
                    date_fin: info.endStr
                });
            },

            dateClick: function(info) {
            // Ouvrir le modal quand on clique sur une date
            openCreateModal(info.date);
            },
        
            select: function(info) {
            // Ouvrir le modal quand on sélectionne une plage
            openCreateModal(info.start, info.end);
            }

        });
        
        document.getElementById('createConsultationForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                
                try {
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    if(response.ok) {
                        // Rafraîchir le calendrier
                        calendar.refetchEvents();
                        // Fermer le modal
                        bootstrap.Modal.getInstance(document.getElementById('createConsultationModal')).hide();
                        // Reset du formulaire
                        this.reset();
                    } else {
                        const errors = await response.json();
                        showFormErrors(errors);
                    }
                } catch(error) {
                    console.error('Erreur:', error);
                }
            });
        calendar.render();

        function openCreateModal(startDate, endDate = null) {
        const modal = new bootstrap.Modal(document.getElementById('createConsultationModal'));
        const form = document.getElementById('createConsultationForm');
        
        // Reset du formulaire
        form.reset();
        
        // Formatage des dates pour l'input datetime-local
        const formatDate = (date) => date.toISOString().slice(0, 16);
        
        // Définit les dates dans le formulaire
        form.querySelector('[name="date_debut"]').value = formatDate(startDate);
        
        if(endDate) {
            form.querySelector('[name="date_fin"]').value = formatDate(endDate);
        } else {
            // Par défaut 1 heure de durée
            const end = new Date(startDate);
            end.setHours(end.getHours() + 1);
            form.querySelector('[name="date_fin"]').value = formatDate(end);
        }
        
        modal.show();
    }
    });
</script>
@endsection



