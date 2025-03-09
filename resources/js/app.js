import './bootstrap';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        events: '/consultations/events', // Route pour récupérer les événements
        editable: true,
        selectable: true,
        select: function (info) {
            // Gérer la sélection d'une plage horaire
            alert('selected ' + info.startStr + ' to ' + info.endStr);
        },
        eventClick: function (info) {
            // Gérer le clic sur un événement
            alert('Event: ' + info.event.title);
        }
    });

    calendar.render();
});
