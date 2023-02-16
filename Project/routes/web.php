<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
# .ADMIN
Route::get('/', function () {return view('dotAdmin');})->name('.admin');

# ABOUT US
Route::view('/aboutUs','aboutUs')->name('aboutUs');

# LOGIN
Route::get('/login', [AuthenticatedSessionController::class, 'form'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);

# REGISTER
Route::get('/register', [RegisterUserController::class, 'form'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

# LOGOUT
Route::get('/logout', [AuthenticatedSessionController::class,'logout'])
    ->name('logout')->middleware('auth');

# NOT VALIDATED YET
Route::view('/notValidated','notValidated')->name('notValidated');

# ADMIN HOME
Route::view('/adminHome','admin.home')->name('adminHome')
    ->middleware('is_admin')->middleware('auth');

# ADMIN PROFIL
Route::view('/adminProfil', 'admin.profil')->name('adminProfil')
    ->middleware('is_admin')->middleware('auth');

# LIST USERS TO VALIDATE
Route::get('/toValidate', [AdminController::class, 'usersListValidate'])->name('toValidate')
    ->middleware('is_admin')->middleware('auth');

# EDIT Type
Route::get('/maj{id}', [AdminController::class, 'majTypeForm'])->name('maj')
    ->middleware('is_admin')->middleware('auth');
Route::post('/majType{id}', [AdminController::class, 'majType'])->name('majType')
    ->middleware('is_admin')->middleware('auth');

# Reject USER
Route::get('/reject{id}', [AdminController::class, 'rejectUserForm'])->name('reject')
    ->middleware('is_admin')->middleware('auth');
Route::post('/rejectUser{id}', [AdminController::class, 'rejectUser'])->name('rejectUser')
    ->middleware('is_admin')->middleware('auth');

# Enseignant HOME
Route::view('/enseignantHome', 'enseignant.home')->name('enseignantHome')
    ->middleware('auth')->middleware('is_enseignant');

# ENSEIGNANT PROFIL
Route::view('/enseignantProfil', 'enseignant.profil')->name('enseignantProfil')
    ->middleware('is_enseignant')->middleware('auth');

# GESTIONNAIRE HOME
Route::view('/gestionnaireHome', 'gestionnaire.home')->name('gestionnaireHome')
    ->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE PROFIL
Route::view('/gestionnaireProfil', 'gestionnaire.profil')->name('gestionnaireProfil')
    ->middleware('is_gestionnaire')->middleware('auth');

# USER PASSWORD EDIT
Route::get('/editPassword',[UserController::class, 'editPasswordForm'])
    ->name('passwordForm')->middleware('auth');
Route::post('/editPassword{id}', [UserController::class, 'editPassword'])
    ->name('editPassword')->middleware('auth');

# USER EDIT NOM
Route::get('/editNom',[UserController::class, 'editNomForm'])
    ->name('nomForm')->middleware('auth');
Route::post('/editNom{id}', [UserController::class, 'editNom'])
    ->name('editNom')->middleware('auth');

# USER EDIT PRENOM
Route::get('/editPrenom',[UserController::class, 'editPrenomForm'])
    ->name('prenomForm')->middleware('auth');
Route::post('/editPrenom{id}', [UserController::class, 'editPrenom'])
    ->name('editPrenom')->middleware('auth');

# ADMIN USER ADD
Route::get('/createUser',[AdminController::class, 'createUserForm'])
    ->name('createUserForm')->middleware('auth')->middleware('is_admin');
Route::post('/createUser', [AdminController::class, 'createUser'])
    ->name('createUser')->middleware('auth')->middleware('is_admin');

# ADMIN USERS LIST (ALL)
Route::get('/usersList', [AdminController::class, 'usersList'])->name('usersList')
    ->middleware('auth')->middleware('is_admin');

# ADMIN COURS LIST (ALL)
Route::get('/coursList', [AdminController::class, 'coursList'])->name('coursList')
    ->middleware('auth')->middleware('is_admin');

# ADMIN COURS ADD
Route::get('/createCours',[AdminController::class, 'createCoursForm'])
    ->name('createCoursForm')->middleware('auth')->middleware('is_admin');
Route::post('/createCours', [AdminController::class, 'createCours'])
    ->name('createCours')->middleware('auth')->middleware('is_admin');

# GESTIONNAIRE ETUDIANT ADD
Route::get('/createEtudiant',[GestionnaireController::class, 'createEtudiantForm'])
    ->name('createEtudiantForm')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/createEtudiant', [GestionnaireController::class, 'createEtudiant'])
    ->name('createEtudiant')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE ETUDIANT LIST ALL
Route::get('/etudiantList', [GestionnaireController::class, 'etudiantsList'])
    ->name('etudiantsList')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE ADD SEANCE COURS
Route::get('/createSeance', [GestionnaireController::class, 'createSeance'])
    ->name('createSeance')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/createSeanceForm-{id}', [GestionnaireController::class, 'createSeanceForm'])
    ->name('createSeanceForm')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/createSeance-{cid}', [GestionnaireController::class, 'createS'])
    ->name('createS')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE ASSOCIATION ETUDIANT COURS INDIVIDUELLEMENT
Route::get('/assoEtuCouList1', [GestionnaireController::class, 'assoEtuCouList1'])
    ->name('assoEtuCouList1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/assoEtuCouList2-{eid}', [GestionnaireController::class, 'assoEtuCouList2'])
    ->name('assoEtuCouList2')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/assoEtuCou1-{eid}-{cid}', [GestionnaireController::class, 'assoEtuCou1'])
    ->name('assoEtuCou1')->middleware('auth')->middleware('is_gestionnaire');
Route::post('assoEtuCou-{eid}-{cid}', [GestionnaireController::class, 'assoEtuCou'])
    ->name('assoEtuCou')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE SUPPRIMER ASSOCIATION ETUDIANT-COURS
Route::get('/deleteAssoA',[GestionnaireController::class, 'deleteEtuAssoA'])
    ->name('deleteEtuAssoA')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteAssoB{eid}',[GestionnaireController::class, 'deleteEtuAssoB'])
    ->name('deleteEtuAssoB')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteAssoC{eid}-{cid}',[GestionnaireController::class, 'deleteEtuAssoC'])
    ->name('deleteEtuAssoC')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/deleteAssoD{cid}-{eid}',[GestionnaireController::class, 'deleteEtuAssoD'])
    ->name('deleteEtuAssoD')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE LISTE ETUDIANTS DE COURS
Route::get('/listEtuDeCours1', [GestionnaireController::class, 'listEtuDeCours1'])
    ->name('listEtuDeCours1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/listEtuDeCours2-{cid}', [GestionnaireController::class, 'listEtuDeCours2'])
    ->name('listEtuDeCours2')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE ASSOCIATION ENSEIGNANT COURS INDIVIDUELLEMENT
Route::get('/assoEnsCouList1', [GestionnaireController::class, 'assoEnsCouList1'])
    ->name('assoEnsCouList1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/assoEnsCouList2-{eid}', [GestionnaireController::class, 'assoEnsCouList2'])
    ->name('assoEnsCouList2')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/assoEnsCou1-{eid}-{cid}', [GestionnaireController::class, 'assoEnsCou1'])
    ->name('assoEnsCou1')->middleware('auth')->middleware('is_gestionnaire');
Route::post('assoEnsCou-{eid}-{cid}', [GestionnaireController::class, 'assoEnsCou'])
    ->name('assoEnsCou')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE SUPPRIMER ASSOCIATION ENSEIGNANT-COURS
Route::get('/listEnsDeCoursA', [GestionnaireController::class, 'listEnsDeCoursA'])
    ->name('listEnsDeCoursA')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/listEnsDeCoursB-{eid}', [GestionnaireController::class, 'listEnsDeCoursB'])
    ->name('listEnsDeCoursB')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteAssoEnsCou-{eid}-{cid}', [GestionnaireController::class, 'deleteAssoEnsCou'])
    ->name('deleteAssoEnsCou')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/deleteAssoEns-{cid}-{eid}' , [GestionnaireController::class, 'deleteAssoEns'])
    ->name('deleteAssoEns')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE LISTE ENSEIGNANTS DE COURS
Route::get('/listEnsDeCours1', [GestionnaireController::class, 'listEnsDeCours1'])
    ->name('listEnsDeCours1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/listEnsDeCours2-{cid}', [GestionnaireController::class, 'listEnsDeCours2'])
    ->name('listEnsDeCours2')->middleware('auth')->middleware('is_gestionnaire');

# ENSEIGNANT COURS ASSOCIES
Route::get('/mesCours', [EnseignantController::class, 'mesCours'])->name('mesCours')
    ->middleware('auth')->middleware('is_enseignant');

# ENSEIGNANTS INSCRITS COURS
Route::get('/inscritsCoursList1', [EnseignantController::class, 'inscritsCoursList1'])
    ->name('inscritsCoursList1')->middleware('auth')->middleware('is_enseignant');
Route::get('/inscritsCoursList2-{cid}', [EnseignantController::class, 'inscritsCoursList2'])
    ->name('inscritsCoursList2')->middleware('auth')->middleware('is_enseignant');

# ENSEIGNANTS POINTAGE D'UN ETUDIANT POUR UNE SEANCE
Route::get('/getSeanceCours1', [EnseignantController::class, 'getSeanceCours1'])
    ->name('getSeanceCours1')->middleware('auth')->middleware('is_enseignant');
Route::get('/getSeanceCours2-{cid}', [EnseignantController::class, 'getSeanceCours2'])
    ->name('getSeanceCours2')->middleware('auth')->middleware('is_enseignant');
Route::get('/getSeanceCours3-{sid}', [EnseignantController::class, 'getSeanceCours3'])
    ->name('getSeanceCours3')->middleware('auth')->middleware('is_enseignant');
Route::post('/pointage{eid}-{sid}', [EnseignantController::class, 'pointage'])
    ->name('pointage')->middleware('auth')->middleware('is_enseignant');

# LISTE DES ETUDIANTS ABSENTS/PRESENTS POUR UNE SEANCE
Route::get('/listAP1', [EnseignantController::class, 'listAP1'])
    ->name('listAP1')->middleware('auth')->middleware('is_enseignant');
Route::get('/listAP2-{cid}', [EnseignantController::class, 'listAP2'])
    ->name('listAP2')->middleware('auth')->middleware('is_enseignant');
Route::get('/listP-{sid}', [EnseignantController::class, 'listP'])
    ->name('listP')->middleware('auth')->middleware('is_enseignant');
Route::get('/listA-{sid}-{cid}', [EnseignantController::class, 'listA'])
    ->name('listA')->middleware('auth')->middleware('is_enseignant');

# ENSEIGNANT TOTAUX DE PRESENCES PAR COURS
Route::get('/coursTotaux', [EnseignantController::class, 'coursTotaux'])
    ->name('coursTotaux')->middleware('auth')->middleware('is_enseignant');
Route::get('/etudiantsList-{cid}', [EnseignantController::class, 'etudiantsListe'])
    ->name('etudiants')->middleware('auth')->middleware('is_enseignant');

# GESTIONNAIRE STAT LIST ETUDIANTS PAGINATION
Route::get('/listetudinat', [GestionnaireController::class, 'etudiantList'])
    ->name('etudiantList')->middleware('auth')->middleware('is_gestionnaire');

# RECHERCHE ETUDIANT
Route::get('/searchEtudiant', [GestionnaireController::class, 'searchEtudiant'])
    ->name('searchEtudiant')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/searchetu', [GestionnaireController::class, 'searchEtu'])
    ->name('searchEtu')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE STAT LISTE DES COURS
Route::get('/coursListe', [GestionnaireController::class, 'coursListe'])
    ->name('coursListe')->middleware('auth')->middleware('is_gestionnaire');


# GESTIONNAIRE STAT LISTE SEANCES POUR UN COURS
Route::get('/seancesCours1', [GestionnaireController::class, 'seancesCours1'])
    ->name('seancesCours1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/seancesCours2-{cid}', [GestionnaireController::class, 'seancesCours2'])
    ->name('seancesCours2')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE LISTE DES PRESENCE DETAILLEE PAR ETUDIANT
Route::get('/lpde1', [GestionnaireController::class, 'lpde1'])
    ->name('lpde1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/lpde2-{eid}', [GestionnaireController::class, 'lpde2'])
    ->name('lpde2')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE LSITE DES PRESENCES (DES ETUDIANTS) PAR SEANCE
Route::get('/lpds1', [GestionnaireController::class, 'lpds1'])
    ->name('lpds1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/lpds2-{cid}', [GestionnaireController::class, 'lpds2'])
    ->name('lpds2')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/lpds3-{sid}-{cid}', [GestionnaireController::class, 'lpds3'])
    ->name('lpds3')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE LISTE DES PRESENCES DES ETUDIANTS PAR COURS
Route::get('/lpdc1', [GestionnaireController::class, 'lpdc1'])
    ->name('lpdc1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/lpdc2-{cid}', [GestionnaireController::class, 'lpdc2'])
    ->name('lpdc2')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE MAJ ETUDIANT
Route::get('/editEtu1', [GestionnaireController::class, 'majEtu1'])
    ->name('editEtu1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/editEtu2-{eid}', [GestionnaireController::class, 'majEtu2'])
    ->name('editEtu2')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/editEtu3-{eid}', [GestionnaireController::class, 'majEtu3'])
    ->name('editEtu3')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE SUPPRIMER ETUDIANT
Route::get('/deleteEtu1',[GestionnaireController::class, 'deleteEtu1'])
    ->name('delete1')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteEtu2-{eid}',[GestionnaireController::class, 'deleteEtu2'])
    ->name('delete2')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/delete3-{eid}', [GestionnaireController::class, 'deleteEtu3'])
    ->name('delete3')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE MODIFIER SEANCE COURS
Route::get('/editSeanceA',[GestionnaireController::class, 'editSeanceCoursA'])
    ->name('editSeanceA')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/editSeanceB{cid}',[GestionnaireController::class, 'editSeanceCoursB'])
    ->name('editSeanceB')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/editSeanceC{sid}',[GestionnaireController::class, 'editSeanceCoursC'])
    ->name('editSeanceC')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/editSeanceD{sid}',[GestionnaireController::class, 'editSeanceCoursD'])
    ->name('editSeanceD')->middleware('auth')->middleware('is_gestionnaire');

# GESTIONNAIRE SUPPRIMER SEANCE COURS
Route::get('/deleteSeanceA',[GestionnaireController::class, 'deleteSeanceCoursA'])
    ->name('deleteSeanceA')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteSeanceB{cid}',[GestionnaireController::class, 'deleteSeanceCoursB'])
    ->name('deleteSeanceB')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/deleteSeanceC{sid}',[GestionnaireController::class, 'deleteSeanceCoursC'])
    ->name('deleteSeanceC')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/deleteSeanceD{sid}',[GestionnaireController::class, 'deleteSeanceCoursD'])
    ->name('deleteSeanceD')->middleware('auth')->middleware('is_gestionnaire');

# ADMIN LIST GESTIONNAIRES
Route::get('/gestionnaireList', [AdminController::class, 'gestionnaireList'])
    ->name('gestionnaireList')->middleware('auth')->middleware('is_admin');

# ADMIN LIST ENSEIGNANTS
Route::get('/enseignantList', [AdminController::class, 'enseignantList'])
    ->name('enseignantList')->middleware('auth')->middleware('is_admin');

# ADMIN RECHERCHE USER PAR (NOM/PRENOM/LOGIN)
Route::get('/searchUser', [AdminController::class, 'searchUser'])
    ->name('searchUser')->middleware('auth')->middleware('is_admin');
Route::post('/searchU', [AdminController::class, 'searchU'])
    ->name('searchU')->middleware('auth')->middleware('is_admin');

# ADMIN MAJ USER
Route::get('/editUser1',[AdminController::class, 'majUser1'])
    ->name('editUser1')->middleware('auth')->middleware('is_admin');
Route::get('/editUser2-{id}',[AdminController::class, 'majUser2'])
    ->name('editUser2')->middleware('auth')->middleware('is_admin');
Route::post('/editUser3-{id}', [AdminController::class, 'majUser3'])
    ->name('editUser3')->middleware('auth')->middleware('is_admin');

# ADMIN SUPPRIMER USER
Route::get('/deleteUser1',[AdminController::class, 'deleteUser1'])
    ->name('deleteUser1')->middleware('auth')->middleware('is_admin');
Route::get('/deleteUser2-{id}',[AdminController::class, 'deleteUser2'])
    ->name('deleteUser2')->middleware('auth')->middleware('is_admin');
Route::post('/deleteUser3-{id}', [AdminController::class, 'deleteUser3'])
    ->name('deleteUser3')->middleware('auth')->middleware('is_admin');

# ADMIN MAJ COURS
Route::get('/editCours1',[AdminController::class, 'editCours1'])
    ->name('editCours1')->middleware('auth')->middleware('is_admin');
Route::get('/editCours2-{cid}',[AdminController::class, 'editCours2'])
    ->name('editCours2')->middleware('auth')->middleware('is_admin');
Route::post('/editCours3-{cid}', [AdminController::class, 'editCours3'])
    ->name('editCours3')->middleware('auth')->middleware('is_admin');

# ADMIN SUPPRIMER COURS
Route::get('/delCours1',[AdminController::class, 'deleteCours1'])
    ->name('delCours1')->middleware('auth')->middleware('is_admin');
Route::get('/deleteCours2-{cid}',[AdminController::class, 'deleteCours2'])
    ->name('deleteCours2')->middleware('auth')->middleware('is_admin');
Route::post('/deleteCours3-{cid}',[AdminController::class, 'deleteCours3'])
    ->name('deleteCours3')->middleware('auth')->middleware('is_admin');

# ADMIN RECHERCHE COURS PAR INTITULE
Route::get('/searchCours', [AdminController::class, 'searchCours'])
    ->name('searchCours')->middleware('auth')->middleware('is_admin');
Route::post('/search',[AdminController::class, 'search'])
    ->name('search')->middleware('auth')->middleware('is_admin');

# GESTIONNAIRE COPIER TOUTES LES ASSOCIATIONS (ETUDIANTS) DUN COURS VERS UN AUTRE COURS
Route::get('/lesCours', [GestionnaireController::class, 'lesCours'])
    ->name('lesCours')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/lesCoursW-{cid}', [GestionnaireController::class, 'lesCoursW'])
    ->name('lesCoursW')->middleware('auth')->middleware('is_gestionnaire');
Route::get('/copierAssoForm-{cid1}-{cid2}', [GestionnaireController::class, 'copierAssoForm'])
    ->name('copierAssoForm')->middleware('auth')->middleware('is_gestionnaire');
Route::post('/copierAsso-{cid1}-{cid2}', [GestionnaireController::class, 'copierAsso'])
    ->name('copierAsso')->middleware('auth')->middleware('is_gestionnaire');

