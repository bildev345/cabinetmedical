<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;


Route::get('/', function () {
    return view('welcome');
});

// Routes pour les consultations
Route::resource('consultations', ConsultationController::class);
// Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');

// Route pour afficher le calendrier
Route::get('/consultations/calendar', [ConsultationController::class, 'calendar'])->name('consultations.calendar');

// Route pour récupérer les événements du calendrier (FullCalendar)
Route::get('/consultations/events', [ConsultationController::class, 'getEvents'])->name('consultations.events');