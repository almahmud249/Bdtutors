<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestTutorController;
use App\Http\Controllers\PreferSubjectController;
use App\Http\Controllers\EducationClassesController;
use App\Http\Controllers\PersonalInformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::post("post_data",[AdminController::class, "AddUser"]);

//personal information

route::post("post_per_info",[PersonalInformationController::class, "AddPerInfo"]);


//get all tutors
route::get("get_users",[PersonalInformationController::class, "GetAllTutors"]);


//get all information
route::get("get_all_info",[PersonalInformationController::class, "GetAllInfo"]);

route::get("get_info_for_profile",[PersonalInformationController::class, "GetInfoForProfile"]);
route::get("get_area",[PersonalInformationController::class, "GetArea"]);


//image
route::post('upload_image',[AdminController::class,'UploadImage']);

//login
route::post('post_login_data',[AdminController::class,'Login']);
route::get('/',[AdminController::class,'index']);
route::get('logout',[AdminController::class,'Logout']);

//tution related information
route::post("post_info",[AdminController::class,'PostInfo']);
route::get("get_allInfo",[AdminController::class,'GetAllInfo']);
route::get("get_all_data",[AdminController::class,'GetAllData']);


//post education
route::post("post_class",[EducationClassesController::class,'PostClass']);
route::get("get_education",[EducationClassesController::class,'GetEducation']);
//post subject
route::post("post_subject",[PreferSubjectController::class,'PostSubject']);
route::get("get_subject",[PreferSubjectController::class,'GetSubject']);
route::post("post_area",[PreferSubjectController::class,'PostArea']);
route::get("get_area",[PreferSubjectController::class,'GetArea']);


route::post("post_for_tutor",[RequestTutorController::class,'PostForTutor']);
route::get("get_tution_data",[RequestTutorController::class,'GetTution']);

// auth user
route::get("auth_user",[AdminController::class,'AuthUser']);



route::any('{slug}',[AdminController::class,'index']);





route::view('/{any}','welcome')->where('any','.*');
