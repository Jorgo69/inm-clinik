<?php

use App\Http\Controllers\Admin\AskingController as AdminAskingController;
use App\Http\Controllers\Director\AskingController;
use App\Http\Controllers\Director\ClinicController;
use App\Http\Controllers\Essay\EssayController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', [EssayController::class, 'homeIndex'])->name('home.index');
Route::post('/try/ask', [EssayController::class, 'store'])->name('try.ask.post');
// Route::get('/director/menu', function(){
//     return view('director.menu');
// })->name('direcor.menu.index');

// Auth - Director Ressource
Route::middleware(['auth', 'director'])->group( function() {
    // Index du menu ou sont liste les cliniques
    Route::get('/director/menu', [ClinicController::class, 'index'])->name('direcor.menu.index');

    // Detail clinique
    Route::get('director/menu/{id}/clinic/detail', [ClinicController::class, 'show'])->name('director.clinic.detail');

    // Inscription de clinique - Post
    Route::post('director/menu/add/clinic', [ClinicController::class, 'store'])->name('director/add/clinic');

});


Route::middleware(['auth', 'admin.systeme'])->group( function() {
    Route::get('/admin/askers/index', [AdminAskingController::class, 'index'])->name('admin.asker.index');
    Route::get('/admin/askers/{asker_id}/detail',[AdminAskingController::class, 'show'])->name('admin.asker.detail');
    Route::put('/admin/askers/put',[AdminAskingController::class, 'edit'])->name('admin.asker.validate');
});

// Auth

Route::middleware(['auth'])->group( function() {
    Route::post('/director/asking/post', [AskingController::class, 'store'])->name('director.asking.post');
});


Route::get('/director/complet/infos', function() {
    return view('director.complet-infos');
})->name('director.complet.infos.index');

// Messenger
Route::get('/messengers', function() {
    return view('messengers.index');
})->name('messenger.index');


// About - A propos
Route::get('/about', function() {
    return view('try.about');
})->name('try.about');

// Offer - Nos Offres
Route::get('/offers-our', function() {
    return view('try.offer');
})->name('try.offer');

// Contact-us - Nous contactez
Route::get('/contact-us', function() {
    return view('try.contact-us');
})->name('try.contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
