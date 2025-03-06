<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\ChirurgieController;

use App\Http\Controllers\ConstantController;




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
