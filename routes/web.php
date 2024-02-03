<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('vues.index_home1');
});

Route::get('/student', function () {
    return view('admin.Etudiants.student-profile');
});

Route::get('/login-professeur', function () {
    return view('auth.loginPage');
});

Auth::routes();
// login App
Route::post('/login/prof/{type}', [LoginController::class, 'loginSubmitProf'])->name('loginSubmitProf');
Route::post('/login/etudiant/{type}', [LoginController::class, 'loginSubmitEtudiant'] )->name('loginSubmitEtudiant');
Route::post('/login/admin/{type}', [LoginController::class, 'loginSubmitAdmin'] )->name('loginSubmitAdmin');


// logout admin
Route::post('logout-admin', [LoginController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::post('logout-etudiant', [LoginController::class, 'logoutEtudiant'])->name('logoutEtudiant');
Route::post('logout-prof', [LoginController::class, 'logoutProf'])->name('logoutProf');

//form login


Route::get('login-admin/{admin}', [LoginController::class, 'showLoginForm'])->name('loginAdmin');
Route::get('login-professeur/{prof}', [LoginController::class, 'showLoginForm'])->name('loginProf');
Route::get('login-etudiant/{etu}', [LoginController::class, 'showLoginForm'])->name('loginEtu');
Route::post('login/{type}', [LoginController::class, 'login'])->name('loginSubmit');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// routes admin
Route::middleware(['web','auth'])->group(function () {
    Route::get('/admin-Dashborad', [AdminController::class, 'index'])->name('admin-Dashborad');
    Route::get('/admin-Dashborad', [AdminController::class, 'index'])->name('admin-Dashborad');
    Route::put('/admin-change-password', [AdminController::class, 'ChangePassword'])->name('admin.ChangePassword');
    Route::get('/admin-list-enseignants', [AdminController::class, 'listeEnseignants'])->name('listeEnseignants');
    Route::get('/admin-list-etudiants', [AdminController::class, 'listeEtudiants'])->name('listeEtudiants');
    Route::get('/admin-list-salles', [AdminController::class, 'listeSalles'])->name('listeSalles');
    Route::get('/admin-list-inscription', [AdminController::class, 'inscription'])->name('inscription');
//gestion enseignant
    Route::get('/admin-add-enseignant', [AdminController::class, 'FromEnseignant'])->name('admin.add-enseignant');
    Route::delete('/admin-delete-enseignant/{idenseignant}', [AdminController::class, 'deleteEnseignants'])->name('admin.destroyEnseignant');
    Route::get('/admin-show-enseignant/{idenseignant}', [AdminController::class, 'ShowEnseignant'])->name('admin.ShowEnseignant');
    Route::get('/admin-add-enseignant', [AdminController::class, 'FromEnseignant'])->name('admin.addEnseignant');
    Route::post('/admin-add-enseignant-post', [AdminController::class, 'addEnseignants'])->name('admin.addEnseignant-post');

//gestion etudiant
    Route::get('/admin-add-etudiant', [AdminController::class, 'FormEtudiant'])->name('admin.add-etudiant');
    Route::delete('/admin-delete-etudiant/{idetudiant}', [AdminController::class, 'deleteEtudiants'])->name('admin.destroyEtudiants');
    Route::get('/admin-show-etudiant/{idetudiant}', [AdminController::class, 'ShowEtudiant'])->name('admin.ShowEtudiant');
    Route::get('/admin-add-etudiant', [AdminController::class, 'FormEtudiant'])->name('admin.AddEtudiant');
    Route::post('/admin-add-etudiant-post', [AdminController::class, 'addEtudiant'])->name('admin.AddEtudiant-post');

    //gestion salle
    Route::delete('/admin-delete-salle/{idsalle}', [AdminController::class, 'deleteSalle'])->name('admin.destroySalle');
    Route::get('/admin-form-salle', [AdminController::class, 'FormSalle'])->name('admin.FormSalle');
    Route::post('/admin-add-Salle-post', [AdminController::class, 'addSalles'])->name('admin.AddSalle');


    // gestion inscription
    Route::get('/admin-list-Candidats', [AdminController::class, 'listInscription'])->name('admin.listInscription');
    Route::get('/admin-show-candidate/{candidate}', [AdminController::class, 'showCandidate'])->name('admin.showCandidate');
    Route::delete('/admin-delete-candidate/{idcandiidate}', [AdminController::class, 'destroyCandidate'])->name('admin.destroyCandidate');
    Route::get('/admin-Candidate-To-Etudiant', [AdminController::class, 'ConvertCandidateToEtudiant'])->name('admin.ConvertCandidateToEtudiant');
    Route::get('/admin-liste-candidate-ajax', [AdminController::class, 'listCandidateFilterAjax'])->name('admin.listeCandidateAjax');

        //gestion Filliere
        Route::get('/admin-list-filliere', [AdminController::class, 'listeFilliere'])->name('admin.listeFilliere');
        Route::delete('/admin-delete-filliere/{idfilliere}', [AdminController::class, 'deleteFilliere'])->name('admin.destroyFilliere');
        Route::get('/admin-form-filliere', [AdminController::class, 'FormFilliere'])->name('admin.FormFilliere');
        Route::post('/admin-add-filliere-post', [AdminController::class, 'addFilliere'])->name('admin.AddFilliere');
    

        //gestion Departement
        Route::get('/admin-list-departement', [AdminController::class, 'listeDepartement'])->name('admin.listeDepartement');
        Route::delete('/admin-delete-departement/{iddepartement}', [AdminController::class, 'deleteDepartement'])->name('admin.destroyDepartement');
        Route::get('/admin-form-departement', [AdminController::class, 'FormDepartement'])->name('admin.FormDepartement');
        Route::post('/admin-add-departement-post', [AdminController::class, 'addDepartement'])->name('admin.AddDepartement');
    
//contact admin route

Route::get('/admin-contact', [AdminController::class, 'contact'])->name('admin.Contact');

    Route::resource('/admin', AdminController::class)->middleware('auth');
});


// routes Professeur
Route::middleware(['web','auth'])->group(function () {
    Route::get('/prof-Dashborad', [ProfesseurController::class, 'index'])->name('prof-Dashborad');
    Route::get('/prof-emploisTemps', [ProfesseurController::class, 'emploisTemps'])->name('prof.prof-emploisTemps');
    Route::get('/prof-cours', [ProfesseurController::class, 'cours'])->name('prof.prof-cours');
    Route::get('/prof-contact', [ProfesseurController::class, 'contact'])->name('prof.contact');
    Route::get('/prof-profile', [ProfesseurController::class, 'Profile'])->name('prof.profile');

// add cours
Route::get('/prof-add-cours', [ProfesseurController::class, 'FormCours'])->name('prof.FormCours');
Route::post('/admin-add-cours-post', [ProfesseurController::class, 'addCours'])->name('prof.addCours');




    Route::put('/admin-change-password', [AdminController::class, 'ChangePassword'])->name('admin.ChangePassword');
    Route::get('/admin-list-enseignants', [AdminController::class, 'listeEnseignants'])->name('listeEnseignants');
    Route::get('/admin-list-etudiants', [AdminController::class, 'listeEtudiants'])->name('listeEtudiants');
    Route::get('/admin-list-salles', [AdminController::class, 'listeSalles'])->name('listeSalles');
    Route::get('/admin-list-inscription', [AdminController::class, 'inscription'])->name('inscription');

//gestion enseignant
});

// route Inscription
Route::get('/Form-inscription', [AdminController::class, 'FormInscription'])->name('FormInscription');
Route::post('/admin-send-inscription', [AdminController::class, 'SendInscription'])->name('admin.send-inscription');

