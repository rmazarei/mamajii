<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;





/*****************************Main Websie Start******************************** */
Route::get("/",function (){
    return view('Website/index');;
});
/*****************************Main Websie End******************************** */

















/*****************************Admin Panel Start******************************** */
Route::group(["prefix"=>"Admin"],function() {

//Login Start
    Route::get('/Login', [AdminController::class,'Login']);
    Route::post('/Login', [AdminController::class,'Login_To']);
    Route::get('/Login2F', [AdminController::class,'Login2F']);
    Route::post('/Login2F', [AdminController::class,'Login2F_Done']);
//Login End

//Dashboard Start
    Route::get('/Dashboard', [AdminController::class,'Dashboard'])->middleware('Admin_Panel_Auth');
//Dashboard End

//Categories Start
    Route::get('/Categories',[AdminController::class,'Categories'])->middleware('Admin_Panel_Auth');
    Route::post('/Categories/New',[AdminController::class,'Categories_New_Update'])->middleware('Admin_Panel_Auth');
    Route::get('/Category/Remove/{id}',[AdminController::class,'Categories_Remove'])->middleware('Admin_Panel_Auth');
    Route::get('/Category/Update/{id}',[AdminController::class,'Categories'])->middleware('Admin_Panel_Auth');
//Categories End

//New Post Start
    Route::get('/NewPost',[AdminController::class,'NewPost'])->middleware('Admin_Panel_Auth');
    Route::get('/NewSoundPost',[AdminController::class,'NewSoundPost'])->middleware('Admin_Panel_Auth');
    Route::post('/NewPostDone',[AdminController::class,'NewPostDone'])->middleware('Admin_Panel_Auth');
    Route::post('/NewSoundPostDone',[AdminController::class,'NewPostSoundDone'])->middleware('Admin_Panel_Auth');
//New Post End

//All Posts Start
    Route::get('/AllPosts',[AdminController::class,'AllPosts'])->middleware('Admin_Panel_Auth');
    Route::get('/AllPosts/Remove/{id}',[AdminController::class,'RemovePost'])->middleware('Admin_Panel_Auth');
    Route::get('/AllPosts/{id}',[AdminController::class,'getpost'])->middleware('Admin_Panel_Auth');
    Route::post('/AllPosts/Update/Done',[AdminController::class,'update_post_submit']);
    Route::post('/AllPosts/Search',[AdminController::class,'all_post_search']);
//All Posts End

//Done Start
    Route::get('/Done', [AdminController::class,'Done'])->middleware('Admin_Panel_Auth');
//Done End

//Logout Start
    Route::get('/Logout', [AdminController::class,'Logout'])->middleware('Admin_Panel_Auth');
//Logout End

//Notification Seen Start
    Route::get('/NotificationSeen', [AdminController::class,'NotificationSeen'])->middleware('Admin_Panel_Auth');
//Notification Seen End

//User Manager Start

    //Get UserManegr
    Route::get('/User/New', [AdminController::class,'Get_New_User'])->middleware('Admin_Panel_Auth');
    Route::post('/User/New/Done', [AdminController::class,'Get_New_User_Done'])->middleware('Admin_Panel_Auth');

    //Get UserManegr
    Route::get('/UserManager', [AdminController::class,'Get_User_Manager'])->middleware('Admin_Panel_Auth');

    //Get times
    Route::get('/UserManager/Times/{user_id}', [AdminController::class,'Get_User_Times'])->middleware('Admin_Panel_Auth');
    Route::post('/UserManager/Times/Done', [AdminController::class,'User_Times_Done'])->middleware('Admin_Panel_Auth');

    //Send Notification To User
    Route::get('/UserManager/Send_Notification/{User_Id}', [AdminController::class,'Get_Notification_To_User'])->middleware('Admin_Panel_Auth');

    //Get Notification of User
    Route::get('/UserManager/Get_Notification/{User_Id}', [AdminController::class,'Get_Notification_OF_User'])->middleware('Admin_Panel_Auth');

    //Submit Send Notification To User
    Route::post('/UserManager/Send_Notification_submit/', [AdminController::class,'Get_Send_Notification_To_User'])->middleware('Admin_Panel_Auth');

    //Get Eidt User
    Route::get('/UserManager/Edit_User/{User_Id}', [AdminController::class,'Get_Edit_User'])->middleware('Admin_Panel_Auth');

    //Get Eidt User
    Route::post('/UserManager/Edit_User_Submit', [AdminController::class,'Get_Edit_User_Submit'])->middleware('Admin_Panel_Auth');

    //Get Eidt User
    Route::post('/UserManager/Search', [AdminController::class,'Search_User'])->middleware('Admin_Panel_Auth');

//User Manager End

//Cites Start

    //Get City Manager
    Route::get('/Cities', [AdminController::class,'Get_Cities'])->middleware('Admin_Panel_Auth');

    //Get City Manager
    Route::get('/Cities/Edit/{id}', [AdminController::class,'Get_Edit_Cities'])->middleware('Admin_Panel_Auth');

    //Get City Manager
    Route::post('/Cities/EditSubmit', [AdminController::class,'Get_Submit_Edit_City'])->middleware('Admin_Panel_Auth');

    //Get New City
    Route::post('/Cities/new', [AdminController::class,'Add_City'])->middleware('Admin_Panel_Auth');

//Cites End

//Groups And Api Start
    //Get Show All Groups Start
    Route::get('/Groups', [AdminController::class,'Groups'])->middleware('Admin_Panel_Auth');

    //Add New User Type
    Route::post('/Groups', [AdminController::class,'NewGroupDone'])->middleware('Admin_Panel_Auth');

    //Remove a User Type
    Route::get('/Groups/Delete/{id}', [AdminController::class,'RemoveGroup'])->middleware('Admin_Panel_Auth');
//Groups And Api End

//Quesion start

    //Get all questions
    Route::get('/Questions', [AdminController::class,'Questions'])->middleware('Admin_Panel_Auth');

    //Get all questions by user
    Route::get('/Questions/{user_id}', [AdminController::class,'QuestionsByUser'])->middleware('Admin_Panel_Auth');

    //Add submit new chat
    Route::post('/AnswerQuestions', [AdminController::class,'QuestionsByUserDone'])->middleware('Admin_Panel_Auth');

//Quesion end

//Profile Start

    //Get User Profile
    Route::get('/Profile', [AdminController::class,'Get_Profile'])->middleware('Admin_Panel_Auth');

    //Get Submit Edit User Profile
    Route::post('/Profile/Update', [AdminController::class,'Get_Profile_Update_Submti'])->middleware('Admin_Panel_Auth');

    //Get User Google Auth
    Route::get('/Profile/ActiveGoogle2auth', [AdminController::class,'ActiveGoogle2auth'])->middleware('Admin_Panel_Auth');
    Route::get('/Profile/PasstiveGoogle2auth', [AdminController::class,'PasstiveGoogle2auth'])->middleware('Admin_Panel_Auth');

//Profile End

//Charts Start
    Route::get('/Charts',[AdminController::class,'Get_Charts'])->middleware('Admin_Panel_Auth');
//Charts End

//Hospitals Start
    Route::get('/Hospitals',[AdminController::class,'GetHospitals'])->middleware('Admin_Panel_Auth');
    Route::get('/Hospitals/New',[AdminController::class,'NewHospital'])->middleware('Admin_Panel_Auth');
    Route::post('/Hospitals/New',[AdminController::class,'NewHospitalSubmit'])->middleware('Admin_Panel_Auth');
    Route::get('/Hospitals/Gallery/{id}',[AdminController::class,'HospitalGallery'])->middleware('Admin_Panel_Auth');
    Route::post('/Hospitals/Gallery/New/{id}',[AdminController::class,'HospitalGalleryNew'])->middleware('Admin_Panel_Auth');
    Route::get('/Hospitals/Gallery/Remove/{hospi_id}/{img_id}',[AdminController::class,'HospitalGalleryRemove'])->middleware('Admin_Panel_Auth');
    Route::get('/Hospitals/Edit/{id}',[AdminController::class,'HospitalEdit'])->middleware('Admin_Panel_Auth');
    Route::post('/Hospitals/Edit/{id}',[AdminController::class,'HospitalEditSubmit'])->middleware('Admin_Panel_Auth');
    Route::post('/Hospitals/Search',[AdminController::class,'GetSearchHospitals'])->middleware('Admin_Panel_Auth');
//Hospitals End

//File Manager Start
    Route::get('/FileManager',[AdminController::class,'fmanager'])->middleware('Admin_Panel_Auth');
    Route::get('/FileManager/Remove',[AdminController::class,'remove_file'])->middleware('Admin_Panel_Auth');
    Route::get('/FileManager/RemoveDir',[AdminController::class,'remove_dir'])->middleware('Admin_Panel_Auth');
    Route::post('/FileManager/NewFolder',[AdminController::class,'newfolder'])->middleware('Admin_Panel_Auth');
    Route::post('/FileManager/UploadFile',[AdminController::class,'uploadfile'])->middleware('Admin_Panel_Auth');
//File Manager End

//New Report Start

    //Get Report Start
    Route::get('/NewReport', [AdminController::class,'New_Report'])->middleware('Admin_Panel_Auth');

    //Get Add New Report
    Route::post('/NewReport/Add', [AdminController::class,'New_Report_Add'])->middleware('Admin_Panel_Auth');

    //Get Remove Report
    Route::get('/NewReport/Remove/{report_id}', [AdminController::class,'Remove_Report'])->middleware('Admin_Panel_Auth');

//New Report End

//Transactions Start
    Route::get('/Transactions', [AdminController::class,'transactions'])->middleware('Admin_Panel_Auth');
//Transactions End

//Visite Start
    Route::get('/Visite', [AdminController::class,'Visite'])->middleware('Admin_Panel_Auth');
    Route::post('/Visite/Search', [AdminController::class,'VisiteSearch'])->middleware('Admin_Panel_Auth');
    Route::get('/Visite/Cancel/{id}', [AdminController::class,'VisiteCancel'])->middleware('Admin_Panel_Auth');
    Route::get('/Visite/Done/{id}', [AdminController::class,'VisiteDone'])->middleware('Admin_Panel_Auth');
//Visite End

//Settings Start

    //Get Report Start
    Route::get('/Settings', [AdminController::class,'Settings'])->middleware('Admin_Panel_Auth');

    //Get Report Start
    Route::post('/Settings/Update', [AdminController::class,'Settings_Update'])->middleware('Admin_Panel_Auth');

//Settings End

//Reports Start

    //Get Report Start
    Route::get('/Reports', [AdminController::class,'Reports'])->middleware('Admin_Panel_Auth');

    //Get Seen Report Start
    Route::get('/ReportSeen/{id}', [AdminController::class,'Seen_Report'])->middleware('Admin_Panel_Auth');

//Reports End






//Store start
    Route::group(["prefix"=>"Store"],function(){

        //Categories Start
        Route::get('/CatStore',[StoreController::class,'Categories'])->middleware('Admin_Panel_Auth');
        Route::post('/CatStore/New',[StoreController::class,'Categories_New_Update'])->middleware('Admin_Panel_Auth');
        Route::get('/CatStore/Remove/{id}',[StoreController::class,'Categories_Remove'])->middleware('Admin_Panel_Auth');
        Route::get('/CatStore/Update/{id}',[StoreController::class,'Categories'])->middleware('Admin_Panel_Auth');
        //Categories End

        //New Store Start
        Route::get('/NewStore',[StoreController::class,'NewStore'])->middleware('Admin_Panel_Auth');
        Route::post('/NewStoreDone',[StoreController::class,'NewStoreDone'])->middleware('Admin_Panel_Auth');
        //New Store End

        //All Posts Start
        Route::get('/AllStores',[StoreController::class,'AllPosts'])->middleware('Admin_Panel_Auth');
        Route::get('/AllStores/Remove/{id}',[StoreController::class,'RemovePost'])->middleware('Admin_Panel_Auth');
        Route::get('/AllStores/{id}',[StoreController::class,'getpost'])->middleware('Admin_Panel_Auth');
        Route::post('/AllStores/Update/Done',[StoreController::class,'update_post_submit']);
        Route::post('/AllStores/Search',[StoreController::class,'all_store_search']);
        //All Posts End

        //All orders start
        Route::get('/AllOrders',[StoreController::class,'AllOrders'])->middleware('Admin_Panel_Auth');
        Route::get('/CurrentOrders',[StoreController::class,'CurrentOrders'])->middleware('Admin_Panel_Auth');
        Route::post('/AllOrders/Search',[StoreController::class,'OrderSearch'])->middleware('Admin_Panel_Auth');
        Route::get('/Order/{id}',[StoreController::class,'OrderDitales'])->middleware('Admin_Panel_Auth');
        Route::get('/Order/Delivery/{id}',[StoreController::class,'OrderDlivery'])->middleware('Admin_Panel_Auth');
        Route::get('/Order/Remove/{id}',[StoreController::class,'OrderRemove'])->middleware('Admin_Panel_Auth');
        Route::get('/Order/Pay/{id}',[StoreController::class,'OrderPay'])->middleware('Admin_Panel_Auth');
        //All orders end

        //All Discounts start
        Route::get('/Discount',[StoreController::class,'GetAllDiscounts'])->middleware('Admin_Panel_Auth');
        Route::post('/Discount/Done',[StoreController::class,'GetAddAllDiscounts'])->middleware('Admin_Panel_Auth');
        Route::get('/Discount/Remove',[StoreController::class,'GetRemoveAllDiscounts'])->middleware('Admin_Panel_Auth');
        //All Discounts end

        //Discount copon start
        Route::get('/Coupon',[StoreController::class,'Coupons'])->middleware('Admin_Panel_Auth');
        Route::post('/Coupon/New',[StoreController::class,'NewCoupon'])->middleware('Admin_Panel_Auth');
        Route::get('/Coupon/Remove/{id}',[StoreController::class,'RemoveCoupon'])->middleware('Admin_Panel_Auth');
        //Discount copon end

    });
//Store end




});
/*****************************Admin Panel End******************************** */







/*****************************Get file start******************************** */
Route::get('File/{hash}',[\App\Http\Controllers\FileController::class,'GetFile']);

Route::get('File_Id/{id}',[\App\Http\Controllers\FileController::class,'GetFile_Hash_By_Id']);

Route::post('File/Add/AddImage',[\App\Http\Controllers\FileController::class,'AddImage']);

Route::post('File/Add/AddSound',[\App\Http\Controllers\FileController::class,'AddSound']);
/*****************************Get file end******************************** */


