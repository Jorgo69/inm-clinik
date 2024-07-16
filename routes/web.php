<?php

use App\Http\Controllers\Admin\AskingController as AdminAskingController;
use App\Http\Controllers\Patient\ClinicController as PatientClinicController;
use App\Http\Controllers\Patient\AskingController as PatientAskingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Director\AskingController as DirectorAskingController;
use App\Http\Controllers\Director\ClinicController;
use App\Http\Controllers\Essay\EssayController;
use App\Http\Controllers\Member\ConsultationController as MemberConsultationController;
use App\Http\Controllers\Member\PatientController as MemberPatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', [EssayController::class, 'homeIndex'])->name('home.index');
Route::post('/try/ask', [EssayController::class, 'store'])->name('try.ask.post');
// Route::get('/director/menu', function(){
//     return view('director.menu');
// })->name('direcor.menu.index');

// Auth - Member Ressource
Route::middleware(['auth'])->group( function() {
    // liste des patients
    Route::get('/member/patient/liste', [MemberPatientController::class, 'index'])->name('member.patient.index');

    // liste des consultations
    Route::get('/member/consultations/liste', [MemberConsultationController::class, 'index'])->name('member.consultation.index');
});

Route::get('/clinic', function(){
    return view('clinic.index');
});


// Auth - Patient Ressource
Route::get('patient/clinic/detail/{clinic_id}', [PatientClinicController::class, 'show'])->name('patient.clinic.detail');
Route::post('/asking/become/clinic/member', [PatientAskingController::class, 'store'])->name('patient.asking.become.clinic.member');



// Auth - Director Ressource
Route::middleware(['auth', 'director'])->group( function() {
    // Index du menu ou sont liste les cliniques
    Route::get('/director/menu', [ClinicController::class, 'index'])->name('direcor.menu.index');

    // Detail clinique
    Route::get('director/menu/{id}/clinic/detail', [ClinicController::class, 'show'])->name('director.clinic.detail');

    // Inscription de clinique - Post
    Route::post('director/menu/add/clinic', [ClinicController::class, 'store'])->name('director/add/clinic');

    // Completer compte pour devenir directeur
    Route::post('/director/asking/post', [DirectorAskingController::class, 'store'])->name('director.asking.post');

    // Voir les demandes pour rejoindre une clinique
    Route::get('director/askers/clinique', [DirectorAskingController::class, 'index'])->name('director.askers.index');

    // Voir la demande - detail
    Route::get('/director/asker/{asker_id}/clinique/detail', [DirectorAskingController::class, 'show'])->name('direcor.asker.detail');

    // Valider demande
    Route::put('/director/asker/clinique/validator/{asking_id}', [DirectorAskingController::class, 'update'])->name('director.asker.validator');

});

// Auth - Admin Ressource
Route::middleware(['auth', 'admin.system'])->group( function() {
    Route::get('/admin/askers/index', [AdminAskingController::class, 'index'])->name('admin.asker.index');
    Route::get('/admin/askers/{asker_id}/detail',[AdminAskingController::class, 'show'])->name('admin.asker.detail');
    Route::put('/admin/askers/put',[AdminAskingController::class, 'edit'])->name('admin.asker.validate');

    // Index Role
    Route::get('/admin/role/index', [RoleController::class, 'index'])->name('admin.role.index');

    // Creer un Role
    Route::post('admin/role/adder', [RoleController::class, 'store'])->name('admin.add.role');
});

// Auth - Director

// Route::middleware(['auth', 'director'])->group( function() {
//     Route::post('/director/asking/post', [DirectorAskingController::class, 'store'])->name('director.asking.post');
// });


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

// Auth - Ressource

Route::middleware(['auth', 'verified'])->group( function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
