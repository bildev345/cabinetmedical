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


// Route::get('/consultations/calendar', 
Route::get('calendar', [ConsultationController::class, 'calendar'])->name('calendar');

// Route pour récupérer les événements du calendrier 
Route::get('events',[ConsultationController::class, 'getEvents'])->name('events');

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
