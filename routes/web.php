<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\EtatConsultationController;
use App\Http\Controllers\TypeConsultationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\ChirurgieController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\MedicamentController;






Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
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

Route::resource('patients', PatientController::class);
Route::resource('/documents', DocumentController::class);
Route::resource('/type_documents', TypeDocumentController::class);
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');
Route::resource('chirurgies', ChirurgieController::class)->parameters([
        'chirurgies' => 'chirurgie'
]);
    // Route::resource('chirurgies', ChirurgieController::class);
    // Route::get('/chirurgies/{chirurgie}/edit', [ChirurgieController::class, 'edit'])->name('chirurgies.edit');
// Route::put('/chirurgies/{chirurgie}', [ChirurgieController::class, 'update'])->name('chirurgies.update');
// Route::delete('chirurgies/{chirurgie}', [ChirurgieController::class, 'destroy'])->name('chirurgies.destroy');

Route::resource('constants', ConstantController::class);
Route::resource('prescriptions', PrescriptionController::class);
Route::resource('medicaments', MedicamentController::class);
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->name('prescriptions.show');

