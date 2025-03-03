<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\EtatConsultationController;
use App\Http\Controllers\TypeConsultationController;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TypeDocumentController;



/*
décommenter ca et changer suivant vos routes et vos vues
Route::get('/home' , function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
});*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Cette route retourne la vue 'home'
Route::get('/', function () {
    return view('elements.home');
});

// Routes pour les consultations
Route::resource('consultations', ConsultationController::class);

// Routes pour etat consultations
Route::resource('etat-consultations', EtatConsultationController::class);

// Routes pour type consultations
Route::resource('type-consultations', TypeConsultationController::class);

// Route pour afficher le calendrier

// Route::resource('consultations/calendar', ConsultationController::class);

// Route::resource('consultations/events', ConsultationController::class);
Route::get('/consultations/calendar', [ConsultationController::class, 'calendar'])->name('consultations.calendar');

// Route pour récupérer les événements du calendrier (FullCalendar)
Route::get('/consultations/events', [ConsultationController::class, 'getEvents'])->name('consultations.events');

// Cette route retourne la vue 'news'
Route::get('/news', function () {
    return view('elements.news');
});

// Cette route retourne la vue 'news'
Route::get('/contact', function () {
    return view('elements.contact');
});

Route::resource('/documents', DocumentController::class);
Route::resource('/type_documents', TypeDocumentController::class);
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');
