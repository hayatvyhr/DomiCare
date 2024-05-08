<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//* User controller
Route::get('/', [UserController::class, "showIndexPage"])->name('login');
Route::get('/signup', [UserController::class, "showSignupFrom"])->middleware('guest');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');

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
