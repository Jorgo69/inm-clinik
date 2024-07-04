<?php

use App\Http\Controllers\Essay\EssayController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', [EssayController::class, 'homeIndex'])->name('home.index');
Route::post('/try/ask', [EssayController::class, 'store'])->name('try.ask.post');
Route::get('/director/menu', function(){
    return view('director.menu');
})->name('direcor.menu.index');

Route::get('/director/complet/infos', function() {
    return view('director.complet-infos');
})->name('director.complet.infos.index');

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
