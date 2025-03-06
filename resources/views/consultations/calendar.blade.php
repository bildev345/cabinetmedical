@extends('layouts.master')
@section('main')
<div class="container">
    <h1>Calendrier des Consultations</h1>
    <div id="calendar"></div>
</div>

@endsection

@section('scripts')

<script src="{{ mix('js/app.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek', // Vue par défaut (semaine)
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '{{ route("consultations.events") }}', // Route pour récupérer les événements
            eventClick: function(info) {
                // Afficher les détails de la consultation
                alert(
                    'Patient: ' + info.event.title + '\n' +
                    'Type: ' + info.event.extendedProps.type + '\n' +
                    'État: ' + info.event.extendedProps.etat
                );
            },
            eventDisplay: 'block', // Afficher les événements comme des blocs
            eventTimeFormat: { // Format de l'heure
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            }
        });

        calendar.render();
    });
</script>
@endsection
