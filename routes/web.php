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
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\ConstantPatientController;
use App\Http\Controllers\ResultatAnalyseController;
use App\Http\Controllers\TypeAnalyseController;






Route::get('/loginFrm', [AuthController::class, 'loginForm'])->name('loginFrm');
Route::get('/registerFrm', [AuthController::class, 'registerForm'])->name('registerFrm');
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

// Calendrier
Route::get('calendar', [ConsultationController::class, 'calendar'])->name('calendar');

// API pour les événements
Route::get('list', [ConsultationController::class, 'list'])->name('list');



// Cette route retourne la vue 'news'
Route::get('/news', function () {
    return view('elements.news');
});

// Cette route retourne la vue 'news'
Route::get('/contact', function () {
    return view('elements.contact');
});

Route::resource('patients', PatientController::class);
//Route::get('patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::resource('/documents', DocumentController::class);
Route::resource('/type_documents', TypeDocumentController::class);

Route::get('/documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');

Route::get('/analyses', [AnalyseController::class, 'index'])->name('analyses.index');
Route::post('/analyses', [AnalyseController::class, 'store'])->name('analyses.store');
Route::put('/analyses/{analyse}', [AnalyseController::class, 'update'])->name('analyses.update');
Route::delete('/analyses/{analyse}', [AnalyseController::class, 'destroy'])->name('analyses.destroy');
Route::get('/analyses/create', [AnalyseController::class, 'create'])->name('analyses.create');
Route::get('/analyses/{analyse}/edit', [AnalyseController::class, 'edit'])->name('analyses.edit');

Route::get('/type_analyses', [TypeAnalyseController::class, 'index'])->name('type_analyses.index');
Route::get('/type_analyses/create', [TypeAnalyseController::class, 'create'])->name('type_analyses.create');
Route::get('/type_analyses/{type_analyse}/edit', [TypeAnalyseController::class, 'edit'])->name('type_analyses.edit');
Route::post('/type_analyses', [TypeAnalyseController::class, 'store'])->name('type_analyses.store');
Route::put('type_analyses/{type_analyse}', [TypeAnalyseController::class, 'update'])->name('type_analyses.update');
Route::delete('/type_analyses/{type_analyse}', [TypeAnalyseController::class, 'destroy'])->name('type_analyses.destroy');

Route::get('/resultats_analyses', [ResultatAnalyseController::class, 'index'])->name('resultats_analyses.index');
Route::get('/resultats_analyses/create', [ResultatAnalyseController::class, 'create'])->name('resultats_analyses.create');
Route::get('/resultats_analyses/{resultatAnalyse}/edit', [ResultatAnalyseController::class, 'edit'])->name('resultats_analyses.edit');
Route::post('/resultats_analyses', [ResultatAnalyseController::class, 'store'])->name('resultats_analyses.store');
Route::put('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'update'])->name('resultats_analyses.update');
Route::delete('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'destroy'])->name('resultats_analyses.destroy');

Route::resource('chirurgies', ChirurgieController::class)->parameters([
        'chirurgies' => 'chirurgie'
]);
  
Route::resource('constants', ConstantController::class);
Route::resource('constant_patient', ConstantPatientController::class);
Route::resource('prescriptions', PrescriptionController::class);
Route::resource('medicaments', MedicamentController::class);
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->name('prescriptions.show');

