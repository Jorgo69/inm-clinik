<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', function () {
    return view('welcome');
})->name('home.index');

// About - A propos
Route::get('/about', function() {
    return view('try.about');
})->name('try.about');

// Offer - Nos Offres
Route::get('/offers-our', function() {
    return view('try.offer');
})->name('try-offer');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
