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
use App\Http\Controllers\Member\AppointmentController as MemberAppointmentController;
use App\Http\Controllers\Member\DoctorController as MemberDoctorController;
use App\Http\Controllers\Member\PersonalController as MemberPersonalController;
use App\Http\Controllers\Member\SecretaryController as MemberSecretaryController;

// Director Controller
use App\Http\Controllers\Director\MemberPersonalController as DirectorMemberPersonalController;
use App\Http\Controllers\Director\MemberSecretaryController as DirectorMemberSecretaryController;
use App\Http\Controllers\Director\MemberDoctorController as DirectorMemberDoctorController;
use App\Http\Controllers\MemberClinicController;

// Ressource Try Folder
// Try - Accueil 
Route::get('/', [EssayController::class, 'homeIndex'])->name('home.index');
Route::post('/try/ask', [EssayController::class, 'store'])->name('try.ask.post');

// Auth - Member Ressource
Route::middleware(['auth'])->group( function() {

    // Vu Secretaire Prise de RDV
    Route::get('/member/secretary/take/appointment/{clinic_id}', [MemberSecretaryController::class, 'index'])->name('member.secretary.index');
    // Ajouter RDV - Secretaire
    Route::get('member/secretary/take/appointment/create/{clinic_id}', [MemberSecretaryController::class, 'create'])->name('member.secretary.create');
    // Ajouter RDV - par lien detail info du patient - Secretaire
    Route::get('member/secretaire/take/appointment/reserving/{clinic_id}/{patient_id}', [MemberSecretaryController::class, 'reserving'])->name('member.secretary.reserving');
    // Recherche de patient pour prise de RDV en temps reel donc JS - Jquery - Ajax
    Route::get('member/secretary/take/appointment/create/search/patient', [MemberSecretaryController::class, 'searchPatient'])->name('member.secretary.serch.patient');
    //Soumission prise de RDV - Secretaire
    Route::post('member/secretaire/take/appointment/store', [MemberSecretaryController::class, 'store'])->name('member.secretary.store.appointment');

    // Vu detail RDV - Secretaire
    Route::get('member/secretary/show/detail/appointment/{clinic_id}', [MemberSecretaryController::class, 'show'])->name('member.secretary.show.detail.appointment');


    // liste des patients
    Route::get('/member/patient/liste/{clinic_id}', [MemberPatientController::class, 'index'])->name('member.patient.index');

    // liste info patient - detail a travail les deux Id Clinique et Patient
    Route::get('/member/patient/liste/{clinic_id}/{patient_id}', [MemberPatientController::class, 'show'])->name('member.patient.show.detail');

    // vu ajouter un compte patient
    Route::get('member/patient/create/{clinic_id}', [MemberPatientController::class, 'create'])->name('member.patient.create');
    // creation de compte patient
    Route::post('member/patient/store/{clinic_id}', [MemberPatientController::class, 'store'])->name('member.patient.store');

    // liste des consultations
    Route::get('/member/consultations/liste/{clinic_id}', [MemberConsultationController::class, 'index'])->name('member.consultation.index');

    // liste des RDV
    Route::get('/member/appointment/liste/{clinic_id}', [MemberAppointmentController::class, 'index'])->name('member.appointment.index');

    // detail consultation specifique pour prise de note
    Route::get('/member/consultation/espace/detail/patient/{consultation_patient_id}', [MemberConsultationController::class, 'show'])->name('member.consultation.detail.show');

    // vu clinique appartient
    Route::get('/member/group/clinics/index', [MemberClinicController::class, 'index'])->name('member.group.clinic.index');

    Route::get('director/menu/{clinic_id}/clinic/detai', [ClinicController::class, 'show'])->name('member-director.clinic.detail');


    
    // Doctor - Only
    // vue - index
    Route::get('/member/doctor/index/{clinic_id}', [MemberDoctorController::class, 'index'])->name('member.doctor.index');
    // liste de tous les RDV
    Route::get('/member/doctor/appointment/all/index/{clinic_id}', [MemberDoctorController::class, 'create'])->name('member.doctor.all.appointment.index');
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

    // Creer un Role
    Route::post('director/role/member/attribute', [DirectorMemberPersonalController::class, 'create'])->name('director.attribute.member.role');

    //  Clinique Specifique - Start

    // Personel - Ressource - Start

    // liste du personnel de la clinique avec son Id
    Route::get('/member/personal/list/{clinic_id}', [DirectorMemberPersonalController::class, 'index'])->name('member.personal.index');
    

    // liste personnel - detail a travers Id
    Route::get('/member/personal/detail/{clinic_id}/{personal_id}', [DirectorMemberPersonalController::class, 'show'])->name('member.personal.detail');

    // Personel - Ressource - End

    // Secretaire - Ressource - Start
    Route::get('director/member/secretary/list/{clinic_id}', [DirectorMemberSecretaryController::class, 'index'])->name('director.member.personal.index');
    // Secretaire - Ressource - End

    // Doctor - Ressource - Start
    Route::get('/director/member/doctor/list/{clinic_id}', [DirectorMemberDoctorController::class, 'index'])->name('director.member.doctor.index');
    // Doctor - Ressource - End

    //  Clinique Specifique - End

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

Route::middleware(['auth', 'verified', 'redirect.member'])->group( function() {
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
