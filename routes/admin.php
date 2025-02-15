<?php

use App\Http\Controllers\Admin\EducationalContentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AdminController::class, "login"]);
Route::post('Admin/login', [AdminController::class, "loginTo"]);
Route::name('admin.')->middleware('auth', 'AdminPanelAuthMiddleware')->group(function () {
    Route::get('/', [AdminController::class, "Dashboard"])->name('dashboard');
    Route::get('dashboard', [AdminController::class, "Dashboard"]);
    Route::get('categories', [AdminController::class, "categories"]);
    Route::get('hospitals', [AdminController::class, "getHospitals"])->name('hospitals.index');
    Route::get('hospitals/new', [AdminController::class, "newHospital"])->name('hospitals.new');
    Route::post('hospitals/new', [AdminController::class, "newHospitalSubmit"])->name('hospitals.new.save');
    Route::get('hospitals/{hospital}/edit', [AdminController::class, "hospitalEdit"])->name('hospitals.edit');
    Route::get('hospitals/gallery/{hospital}', [AdminController::class, "hospitalGallery"])->name('hospitals.gallery');
    Route::post('hospitals/gallery/new',
        [AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    //     Route::post('hospitals/gallery/new/{hospital}', [\App\Http\Controllers\AdminController::class, "hospitalGalleryNew"])->name('hospitals.gallery.save');
    Route::get('users/create', [AdminController::class, 'createUser'])->name('user.create');
    Route::get('visits', [AdminController::class, 'visitsIndex'])->name('visits.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
//    Route::get('/users', [AdminController::class, 'getUserManager'])->name('users.manage');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'getNewUserDone'])->name('users.create.done');
    Route::get('/users/{user}/time', [AdminController::class, 'getUserTimes'])->name('users.times');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{user}', [AdminController::class, 'userTimesDone'])->name('users.times.store');
    Route::put('/users/{user}', [AdminController::class, 'UpdateUser'])->name('users.update');

    Route::get('/newPost', [AdminController::class, 'newPost'])->name('posts.create');

    Route::get('/stores', [\App\Http\Controllers\Admin\StoreController::class, 'index'])->name('stores.index');
    Route::get('/stores/create', [\App\Http\Controllers\Admin\StoreController::class, 'create'])->name('stores.create');
    Route::get('/stores/{store}', [\App\Http\Controllers\Admin\StoreController::class, 'show'])->name('stores.show');

    Route::resource('educational_contents', EducationalContentController::class);// Additional routes for soft delete functionality
    Route::post('educational_contents/{id}/restore', [EducationalContentController::class, 'restore'])->name('educational_contents.restore');
    Route::delete('educational_contents/{id}/forceDelete', [EducationalContentController::class, 'forceDelete'])->name('educational_contents.forceDelete');
    Route::delete('educational_contents/files/{file}', [EducationalContentController::class, 'destroyFile'])
        ->name('educational_contents.files.destroy');
});
