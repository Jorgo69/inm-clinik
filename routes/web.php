<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Essay\EssayController;
use App\Http\Controllers\Director\ClinicController;
use App\Http\Controllers\Patient\SettingController as PatientSettingController;
use App\Http\Controllers\Admin\AskingController as AdminAskingController;
use App\Http\Controllers\Member\PatientController as MemberPatientController;
use App\Http\Controllers\Patient\AskingController as PatientAskingController;
use App\Http\Controllers\Patient\ClinicController as PatientClinicController;
use App\Http\Controllers\Director\AskingController as DirectorAskingController;
use App\Http\Controllers\Member\ConsultationController as MemberConsultationController;
use App\Http\Controllers\Member\DoctorController as MemberDoctorController;
use App\Http\Controllers\Member\PersonalController as MemberPersonalController;
use App\Http\Controllers\Member\SecretaryController as MemberSecretaryController;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', [EssayController::class, 'homeIndex'])->name('home.index');
Route::post('/try/ask', [EssayController::class, 'store'])->name('try.ask.post');
// Route::get('/director/menu', function(){
//     return view('director.menu');
// })->name('direcor.menu.index');

// Auth - Member Ressource
Route::middleware(['auth'])->group( function() {

    // Vu Secretaire Prise de RDV
    Route::get('/member/secretary/take/appointment/{clinic_id}', [MemberSecretaryController::class, 'index'])->name('member.secretary.index');


    // liste des patients
    Route::get('/member/patient/liste/{clinic_id}', [MemberPatientController::class, 'index'])->name('member.patient.index');

    // liste info patient - detail a travail les deux Id Clinique et Patient
    Route::get('/member/patient/liste/{clinic_id}/{patient_id}', [MemberPatientController::class, 'show'])->name('member.patient.show.detail');

    // liste des consultations
    Route::get('/member/consultations/liste/{clinic_id}', [MemberConsultationController::class, 'index'])->name('member.consultation.index');

    // detail consultation specifique pour prise de note
    Route::get('/member/consultation/espace/detail/patient/{consultation_patient_id}', [MemberConsultationController::class, 'show'])->name('member.consultation.detail.show');

    // liste du personnel de la clinique avec son Id
    Route::get('/member/personal/liste/{clinic_id}', [MemberPersonalController::class, 'index'])->name('member.personal.index');
    

    // liste personnel - detail a travers Id
    Route::get('/member/personal/detail/{clinic_id}/{personal_id}', [MemberPersonalController::class, 'show'])->name('member.personal.detail');

    // Doctor - Only
    // vue - index
    Route::get('/member/doctor/', [MemberDoctorController::class, 'index'])->name('member.doctor.index');
});

Route::get('/clinic', function(){
    return view('clinic.index');
});


// Auth - Patient Ressource
Route::middleware(['auth'])->group( function() {
    // Vue indec-detail de la clique ou il faut faire sa demande
    Route::get('patient/clinic/detail/{clinic_id}', [PatientClinicController::class, 'show'])->name('patient.clinic.detail');

    // Demande pour devenir membre d'une clinique
    Route::post('/asking/become/clinic/member', [PatientAskingController::class, 'store'])->name('patient.asking.become.clinic.member');

    // Vue Index des parametre du patient
    Route::get('/patient/seeting/index', [PatientSettingController::class, 'index'])->name('patient.setting.index');
});



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

    // Setings Index


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
