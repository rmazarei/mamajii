<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/***********************Api V1 Client***********************************/
Route::get("/V1/Client/Config",[\App\Http\Controllers\ApiV1Controller::class,'Config']);
Route::post("/V1/Client/Login",[\App\Http\Controllers\ApiV1Controller::class,'Login']);
Route::post("/V1/Client/Verify",[\App\Http\Controllers\ApiV1Controller::class,'Verify']);
Route::post("/V1/Client/Logout",[\App\Http\Controllers\ApiV1Controller::class,'Logout']);
Route::get("/V1/Client/Hospitals",[\App\Http\Controllers\ApiV1Controller::class,'AllHospitals']);

Route::get("/V1/Client/StoreCategories",[\App\Http\Controllers\StoreApiController::class,'StoreCetegories']);
Route::get("/V1/Client/StoreCategories/{cat_id}",[\App\Http\Controllers\StoreApiController::class,'StorePostsByCategories']);
Route::post("/V1/Client/DoneOrder",[\App\Http\Controllers\StoreApiController::class,'DoneOrder'])->middleware('ApiV1Middle');
Route::post("/V1/Client/AllUserOrders",[\App\Http\Controllers\StoreApiController::class,'GetAllUserOrders'])->middleware('ApiV1Middle');

Route::get("/V1/Client/GetAllChats/{doctor_id}",[\App\Http\Controllers\ApiV1Controller::class,'GetAllChats']);
Route::post("/V1/Client/AddNewChat",[\App\Http\Controllers\ApiV1Controller::class,'AddNewChat']);

Route::get("/V1/Client/Notifications",[\App\Http\Controllers\ApiV1Controller::class,'Notifications'])->middleware('ApiV1Middle');
Route::get("/V1/Client/GetCountofNotifications",[\App\Http\Controllers\ApiV1Controller::class,'GetCountofNotifications'])->middleware('ApiV1Middle');
Route::get("/V1/Client/User",[\App\Http\Controllers\ApiV1Controller::class,'User'])->middleware('ApiV1Middle');
Route::post("/V1/Client/UserDone",[\App\Http\Controllers\ApiV1Controller::class,'UserDone'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetCityAllDoctors",[\App\Http\Controllers\ApiV1Controller::class,'GetCityAllDoctors'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetCityAllHospitals",[\App\Http\Controllers\ApiV1Controller::class,'GetCityAllHospitals'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetSearchDoctor",[\App\Http\Controllers\ApiV1Controller::class,'GetSearchDoctor'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetDoctorVisites",[\App\Http\Controllers\ApiV1Controller::class,'GetCheckVisite'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetHospitalVisites",[\App\Http\Controllers\ApiV1Controller::class,'GetCheckHospitalVisite'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetPayVisiteTime",[\App\Http\Controllers\ApiV1Controller::class,'GetPaymentDoctorTime']);
Route::post("/V1/Client/SetVisiteTime",[\App\Http\Controllers\ApiV1Controller::class,'SetDoctorTime'])->middleware('ApiV1Middle');
Route::post("/V1/Client/SetHospitalTime",[\App\Http\Controllers\ApiV1Controller::class,'SetHospitalTime'])->middleware('ApiV1Middle');
Route::post("/V1/Client/GetAllFreePosts",[\App\Http\Controllers\ApiV1Controller::class,'GetAllFreePosts'])->middleware('ApiV1Middle');
Route::get("/V1/Client/GetAllFreeSoundUsers",[\App\Http\Controllers\ApiV1Controller::class,'GetAllFreeSoundUsers'])->middleware('ApiV1Middle');
Route::get("/V1/Client/GetAllSoundsPostByCategory/{category_id}",[\App\Http\Controllers\ApiV1Controller::class,'GetAllSoundsPostByCategory'])->middleware('ApiV1Middle');
Route::get("/V1/Client/GetAllPackageSoundUsers",[\App\Http\Controllers\ApiV1Controller::class,'GetAllPackageSoundUsers'])->middleware('ApiV1Middle');
Route::get("/V1/Client/GetPackageInfo/{Pack_Id}",[\App\Http\Controllers\ApiV1Controller::class,'GetPackageInfo'])->middleware('ApiV1Middle');
/***********************Api V1 Client***********************************/
