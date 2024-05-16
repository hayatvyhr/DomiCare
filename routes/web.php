<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\AdminDashboardController;

//* User controller
Route::get('/', [UserController::class, "showIndexPage"])->name('login');
Route::get('/signup', [UserController::class, "showSignupFrom"])->middleware('guest');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');
Route::get('/dashboard-partenaire', [UserController::class, 'dashboardPartenaire'])->name('dashboard-partenaire');
Route::get('/profile/{user:username}', [UserController::class, 'showProfile'])->middleware('mustBeLoggedIn');
Route::post('/profile/{user:username}', [UserController::class, 'updateProfile'])->middleware('mustBeLoggedIn');

//* Category controller
Route::get('/search/{category:nom}', [CategoryController::class, "showCategory"]);

//* Service controller
Route::get('/search/{category:nom}/{intervention:nom}', [ServiceController::class, "showService"]);

//* Booking controller
Route::get('/search/{category:nom}/{intervention:nom}/{service}', [BookingController::class, "showBookingForm"])->middleware('mustBeLoggedIn');
Route::post('/reserver', [BookingController::class, "reserver"])->middleware('mustBeLoggedIn');
Route::get('/reservations/{etat}', [BookingController::class, "showReservations"])->middleware('mustBeLoggedIn');
Route::post('/supprimer', [BookingController::class, "supprimerReservation"])->middleware('mustBeLoggedIn');
Route::post('/commenter', [BookingController::class, "commenterService"]);

//* Demande controller
Route::get('/dashboard-partenaire/demandes', [DemandeController::class, 'index'])->name('dashboard-partenaire-demandes');
Route::post('/demande/accept/{id_demande}', [DemandeController::class, 'accept'])->name('demande.accept');
Route::post('/demande/refuse/{id_demande}', [DemandeController::class, 'refuse'])->name('demande.refuse');
// routes/web.php
Route::post('/demande/terminer/{id_demande}', [DemandeController::class, 'terminer'])->name('demande.terminer');
Route::get('/client/info/{id_client}', [DemandeController::class, 'show'])->name('dashboard-profil-client');

//* Partenaire Controller
Route::get('/dashboard-partenaire/profil', [PartenaireController::class, 'profil'])->name('dashboard-partenaire-profil');
Route::post('/submit-comment', [PartenaireController::class, 'storeComment'])->name('comment.store');
Route::post('/submit-form', [PartenaireController::class, 'update_client'])->name('update_client.store');
Route::get('/dashboardComments', [PartenaireController::class, 'dash_comments'])->name('dashboard-partenaire-comments');
Route::get('/dashboard-partenaire/service', [PartenaireController::class, 'service'])->name('dashboard-partenaire-service');
Route::delete('/service/{service}', [PartenaireController::class, 'destroy'])->name('service.destroy');
Route::get('showAllComments/{serviceId}', [PartenaireController::class, 'showAll'])->name('showAllComments');
Route::put('/services/{service}', [PartenaireController::class, 'update'])->name('service.update');

Route::put('service_dispo/{service}', [PartenaireController::class, 'availability'])->name('service.availability');

//* Service Controller
Route::get('/dashboard-partenaire/add-service', function () {
  return view('dashboard-partenaire.add_service');
})->name('dashboard.partenaire.add_service');
Route::post('/dashboard-partenaire/service/store', [ServiceController::class, 'store'])->name('dashboard.partenaire.service.store');

//* Admin Controller 
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
