@extends('layouts.master')
@section('main')
<div class="container">
    <br>
    <a href="{{ route('consultations.index') }}" class="btn btn-primary mb-3"> Consultations</a>
    <h1>Calendrier des Consultations</h1>
    <div id="calendar"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '{{ route("events") }}',
            editable: true,
            selectable: true,
            select: function(info) {
                window.location.href = "{{ route('consultations.create') }}?start=" + info.startStr + "&end=" + info.endStr;
            },
            eventClick: function(info) {
                window.location.href = "{{ route('consultations.edit', '') }}/" + info.event.id;
            },
            eventDrop: function(info) {
                // Mettre à jour la consultation dans la base de données
                // axios.put("{{ route('consultations.update', '') }}/" + info.event.id, {
                //     date_debut: info.event.start.toISOString(), // Nouvelle date de début
                //     date_fin: info.event.end ? info.event.end.toISOString() : null, // Nouvelle date de fin
                // }).then(response => {
                //     toastr.success('Consultation mise à jour avec succès.');
                // }).catch(error => {
                //     toastr.error('Erreur lors de la mise à jour de la consultation.');
                //     info.revert(); // Annuler le déplacement en cas d'erreur
                // });
                    console.log('Nouvelle date de début:', info.event.start);
                    console.log('Nouvelle date de fin:', info.event.end);

                    axios.put("{{ route('consultations.update', '') }}/" + info.event.id, {
                        date_debut: info.event.start.toISOString(),
                        date_fin: info.event.end ? info.event.end.toISOString() : null,
                    }).then(response => {
                        toastr.success('Consultation mise à jour avec succès.');
                    }).catch(error => {
                        console.error('Erreur:', error.response); // Afficher l'erreur dans la console
                        toastr.error('Erreur lors de la mise à jour de la consultation.');
                        info.revert();
                    });
            },
            eventResize: function(info) {
                // Mettre à jour la consultation dans la base de données
                axios.put("{{ route('consultations.update', '') }}/" + info.event.id, {
                    date_debut: info.event.start.toISOString(), // Date de début (inchangée)
                    date_fin: info.event.end.toISOString(), // Nouvelle date de fin
                }).then(response => {
                    toastr.success('Consultation mise à jour avec succès.');
                }).catch(error => {
                    toastr.error('Erreur lors de la mise à jour de la consultation.');
                    info.revert(); // Annuler le redimensionnement en cas d'erreur
                });
            },
            eventDisplay: 'block',
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            }
        });

        calendar.render();

        // Rafraîchir les événements après la création d'une consultation
        @if(session('success'))
            calendar.refetchEvents();
            toastr.success("{{ session('success') }}");
        @endif
    });
</script>

@endsection