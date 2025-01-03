<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('user.home');
})->name('public.home');

Route::get('/signup', [UserController::class, 'signup'])->name('user.signup');
Route::post('/signup', [UserController::class, 'signupSubmit'])->name('user.signup.submit');

// User Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');

Route::get('/property/{id}', [UserController::class, 'showPropertyDetailsForPublic'])->name('user.details');

Route::get('user/properties', [UserController::class, 'properties'])->name('user.properties');
Route::get('/user/service', [UserController::class, 'service'])->name('user.service');
Route::middleware(['auth:landlord'])->group(function () {
    Route::get('/landlord/home', [UserController::class, 'landlordHome'])->name('landlord.user_home');

});

Route::middleware(['auth:tenant'])->group(function () {
    Route::get('/tenant/home', [UserController::class, 'tenantHome'])->name('tenant.user_home');

});


Route::middleware(['auth:visitor'])->group(function () {
    Route::get('/visitor/home', [UserController::class, 'visitorHome'])->name('visitor.user_home');
    });
