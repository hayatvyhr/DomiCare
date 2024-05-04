<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//* User controller
Route::get('/', [UserController::class, "showIndexPage"])->name('login');
Route::get('/signup', [UserController::class, "showSignupFrom"]);
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"]);

//* Category controller
Route::get('/search/{category:nom}', [CategoryController::class, "showCategory"]);

//* Service controller
Route::get('/search/{category:nom}/{intervention:nom}', [ServiceController::class, "showService"]);
Route::post('/search/{category:nom}/{intervention:nom}', [ServiceController::class, "showService"]);
