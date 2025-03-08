<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TypeDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
//Route::resource('analyses', AnalyseController::class);

Route::get('/analyses', [AnalyseController::class, 'index'])->name('analyses.index');
Route::post('/analyses', [AnalyseController::class, 'store'])->name('analyses.store');
Route::put('/analyses/{analyse}', [AnalyseController::class, 'update'])->name('analyses.update');
Route::delete('/analyses/{analyse}', [AnalyseController::class, 'destroy'])->name('analyses.destroy');
Route::get('/analyses/create', [AnalyseController::class, 'create'])->name('analyses.create');
Route::get('/analyses/{analyse}/edit', [AnalyseController::class, 'edit'])->name('analyses.edit');
//Route::resource('type_analyses', TypeAnalyseController::class);

Route::get('/type_analyses', [TypeAnalyseController::class, 'index'])->name('type_analyses.index');
Route::get('/type_analyses/create', [TypeAnalyseController::class, 'create'])->name('type_analyses.create');
Route::get('/type_analyses/{type_analyse}/edit', [TypeAnalyseController::class, 'edit'])->name('type_analyses.edit');
Route::post('/type_analyses', [TypeAnalyseController::class, 'store'])->name('type_analyses.store');
Route::put('type_analyses/{type_analyse}', [TypeAnalyseController::class, 'update'])->name('type_analyses.update');
Route::delete('/type_analyses/{type_analyse}', [TypeAnalyseController::class, 'destroy'])->name('type_analyses.destroy');
//Route::resource('resultats_analyses', ResultatAnalyseController::class);

Route::get('/resultats_analyses', [ResultatAnalyseController::class, 'index'])->name('resultats_analyses.index');
Route::get('/resultats_analyses/create', [ResultatAnalyseController::class, 'create'])->name('resultats_analyses.create');
Route::get('/resultats_analyses/{resultatAnalyse}/edit', [ResultatAnalyseController::class, 'edit'])->name('resultats_analyses.edit');
Route::post('/resultats_analyses', [ResultatAnalyseController::class, 'store'])->name('resultats_analyses.store');
Route::put('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'update'])->name('resultats_analyses.update');
Route::delete('/resultats_analyses/{resultatAnalyse}', [ResultatAnalyseController::class, 'destroy'])->name('resultats_analyses.destroy');

