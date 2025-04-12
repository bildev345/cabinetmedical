<?php

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
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\ConstantPatientController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ResultatAnalyseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TypeAnalyseController;

Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//Route::get('/register', [RegisterUserController::class, 'create'])->name('register.create');
//Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');


// Cette route retourne la vue 'home'
Route::get('/', function () {
    return view('elements.home');
})->name('home');

// Routes pour les consultations
Route::resource('consultations', ConsultationController::class)->middleware('auth');

// Routes pour etat consultations
Route::resource('etat-consultations', EtatConsultationController::class)->middleware('auth');

// Routes pour type consultations
Route::resource('type-consultations', TypeConsultationController::class)->middleware('auth');

// Calendrier
Route::get('calendar', [ConsultationController::class, 'calendar'])->middleware('auth')->name('calendar');

// API pour les événements
Route::get('list', [ConsultationController::class, 'list'])->middleware('auth')->name('list');



// Cette route retourne la vue 'news'
Route::get('/news', function () {
    return view('elements.news');
});

// Cette route retourne la vue 'news'
Route::get('/contact', function () {
    return view('elements.contact');
});

Route::resource('patients', PatientController::class)->middleware('auth');
//Route::get('patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::resource('/documents', DocumentController::class)->middleware('auth');
Route::resource('/type_documents', TypeDocumentController::class)->middleware('auth');

Route::get('/documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');

Route::get('/analyses', [AnalyseController::class, 'index'])->middleware('auth')->name('analyses.index');
Route::post('/analyses', [AnalyseController::class, 'store'])->middleware('auth')->name('analyses.store');
Route::put('/analyses/{analyse}', [AnalyseController::class, 'update'])->middleware('auth')->name('analyses.update');
Route::delete('/analyses/{analyse}', [AnalyseController::class, 'destroy'])->middleware('auth')->name('analyses.destroy');
Route::get('/analyses/create', [AnalyseController::class, 'create'])->name('analyses.create');
Route::get('/analyses/{analyse}/edit', [AnalyseController::class, 'edit'])->name('analyses.edit');

Route::get('/type_analyses', [TypeAnalyseController::class, 'index'])->middleware('auth')->name('type_analyses.index');
Route::get('/type_analyses/create', [TypeAnalyseController::class, 'create'])->name('type_analyses.create');
Route::get('/type_analyses/{type_analyse}/edit', [TypeAnalyseController::class, 'edit'])->name('type_analyses.edit');
Route::post('/type_analyses', [TypeAnalyseController::class, 'store'])->middleware('auth')->name('type_analyses.store');
Route::put('type_analyses/{type_analyse}', [TypeAnalyseController::class, 'update'])->middleware('auth')->name('type_analyses.update');
Route::delete('/type_analyses/{type_analyse}', [TypeAnalyseController::class, 'destroy'])->middleware('auth')->name('type_analyses.destroy');

Route::get('/resultats_analyses', [ResultatAnalyseController::class, 'index'])->middleware('auth')->name('resultats_analyses.index');
Route::get('/resultats_analyses/create', [ResultatAnalyseController::class, 'create'])->name('resultats_analyses.create');
Route::get('/resultats_analyses/{resultatAnalyse}/edit', [ResultatAnalyseController::class, 'edit'])->name('resultats_analyses.edit');
Route::post('/resultats_analyses', [ResultatAnalyseController::class, 'store'])->middleware('auth')->name('resultats_analyses.store');
Route::put('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'update'])->middleware('auth')->name('resultats_analyses.update');
Route::delete('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'destroy'])->middleware('auth')->name('resultats_analyses.destroy');

Route::resource('chirurgies', ChirurgieController::class)->parameters([
        'chirurgies' => 'chirurgie'
])->middleware('auth');

Route::resource('constants', ConstantController::class)->middleware('auth');
Route::resource('constant_patient', ConstantPatientController::class)->middleware('auth');
Route::resource('prescriptions', PrescriptionController::class)->middleware('auth');
Route::resource('medicaments', MedicamentController::class)->middleware('auth');
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->middleware('auth')->name('prescriptions.show');

