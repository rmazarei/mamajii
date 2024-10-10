<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AdminController::class, "login"]);
Route::post('Admin/login', [AdminController::class, "loginTo"]);
Route::name('admin.')->middleware('auth', 'AdminPanelAuthMiddleware')->group(function(){
    Route::get('/', [AdminController::class, "Dashboard"])->name('dashboard');
    Route::get('dashboard', [AdminController::class, "Dashboard"]);
    Route::get('categories', [AdminController::class, "categories"]);
    Route::get('hospitals', [AdminController::class, "getHospitals"])->name('hospitals.index');
    Route::get('hospitals/new', [AdminController::class, "newHospital"])->name('hospitals.new');
    Route::post('hospitals/new', [AdminController::class, "newHospitalSubmit"])->name('hospitals.new.save');
    Route::get('hospitals/{hospital}/edit', [AdminController::class, "hospitalEdit"])->name('hospitals.edit');
    Route::get('hospitals/gallery/{hospital}', [AdminController::class, "hospitalGallery"])->name('hospitals.gallery');
    Route::post('hospitals/gallery/new', [AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    //     Route::post('hospitals/gallery/new/{hospital}', [\App\Http\Controllers\AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    Route::get('users/create', [AdminController::class, 'createUser'])->name('user.create');
    Route::get('visits', [AdminController::class, 'visitsIndex'])->name('visits.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
//    Route::get('/users', [AdminController::class, 'getUserManager'])->name('users.manage');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'getNewUserDone'])->name('users.create.done');
    Route::get('/users/{user}/time', [AdminController::class, 'getUserTimes'])->name('users.times');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{user}', [AdminController::class, 'userTimesDone'])->name('users.times.store');
});
