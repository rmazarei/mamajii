<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/about', function(){
    return Inertia::render('About');
});
Route::get('/contact', function(){
    return Inertia::render('Contact');
});
*/


Route::get("/", [\App\Http\Controllers\GeneralController::class, "index"]);
Route::get("/about", [\App\Http\Controllers\GeneralController::class, "about"]);
Route::get("/contact", [\App\Http\Controllers\GeneralController::class, "contact"]);
Route::get("/articles", [\App\Http\Controllers\GeneralController::class, "articles"]);
Route::get("/courses", [\App\Http\Controllers\GeneralController::class, "courses"]);

Route::get('hospitals/{hospital}', [\App\Http\Controllers\HospitalController::class, "show"])->name('hospitals.show');
Route::get('/doctors/{user}', [\App\Http\Controllers\UserController::class, "showDoctor"])->name('doctors.show');

// Booking
Route::get('booking/{user}', [\App\Http\Controllers\BookingController::class, 'stepOne'])->name('booking.one');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
