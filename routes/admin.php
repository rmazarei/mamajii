<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/login', [\App\Http\Controllers\AdminController::class, "login"]);
Route::post('Admin/login', [\App\Http\Controllers\AdminController::class, "loginTo"]);
Route::name('admin.')->middleware('auth', 'AdminPanelAuthMiddleware')->group(function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, "Dashboard"])->name('dashboard');
    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, "Dashboard"]);
    Route::get('categories', [\App\Http\Controllers\AdminController::class, "categories"]);
    Route::get('hospitals', [\App\Http\Controllers\AdminController::class, "getHospitals"])->name('hospitals.index');
    Route::get('hospitals/new', [\App\Http\Controllers\AdminController::class, "newHospital"])->name('hospitals.new');
    Route::post('hospitals/new', [\App\Http\Controllers\AdminController::class, "newHospitalSubmit"])->name('hospitals.new.save');
    Route::get('hospitals/{hospital}/edit', [\App\Http\Controllers\AdminController::class, "hospitalEdit"])->name('hospitals.edit');
    Route::get('hospitals/gallery/{hospital}', [\App\Http\Controllers\AdminController::class, "hospitalGallery"])->name('hospitals.gallery');
    Route::post('hospitals/gallery/new', [\App\Http\Controllers\AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    //     Route::post('hospitals/gallery/new/{hospital}', [\App\Http\Controllers\AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    Route::get('users/create', [\App\Http\Controllers\AdminController::class, 'createUser'])->name('user.create');
    Route::get('visits', [\App\Http\Controllers\AdminController::class, 'visitsIndex'])->name('visits.index');
});
