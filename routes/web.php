<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/login', [PagesController::class, 'login']);




        
   
Route::group(['middleware' => 'prevent-back-history'],function(){
 

  //All Patient Routes


  Route::prefix('/patient')->name('patient.')->namespace('Patient')->group(function(){

      Route::get('/dashboard',[App\Http\Controllers\Patient\DashboardController::class,'index'])->name('dashboard')->middleware('patient');
    

      //Login Routes
      Route::get('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'PatientRegisterForm'])->name('register');
      Route::post('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'RegisterPatient']);
      Route::get('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Patient\Auth\LoginController::class,'logout'])->name('logout');
  

      //Profile Routes

      Route::get('/profile/complete',[App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteForm'])->name('CompleteForm')->middleware('patient');
      Route::post('/profile/complete', [App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteProfile']);
  

     


  
    });
  
  


  //All Doctor Routes


  
  Route::prefix('/doctor')->name('doctor.')->namespace('Doctor')->group(function(){

      Route::get('/dashboard',[App\Http\Controllers\Doctor\DashboardController::class,'index'])->middleware('doctor')->name('dashboard');
    
      //Login Routes
      Route::get('/login',[App\Http\Controllers\Doctor\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Doctor\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Doctor\Auth\LoginController::class,'logout'])->name('logout');
  
  });
   
    


  //All Admin Routes




  Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    
    //Dashboard Routes
      Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->middleware('admin')->name('dashboard');
     
      // Admin Profile Routes

      Route::get('/profile/view',[App\Http\Controllers\Admin\Profile\viewProfileController::class,'ViewProfile'])->middleware('admin')->name('profile');
      Route::post('/profile/view',[App\Http\Controllers\Admin\Profile\viewProfileController::class,'ChangeName']);

      Route::get('/profile/password',[App\Http\Controllers\Admin\Profile\viewProfileController::class,'ViewPassword'])->middleware('admin')->name('password');
      Route::post('/profile/password',[App\Http\Controllers\Admin\Profile\viewProfileController::class,'ChangePassword']);
     
      //Doctor->Admin Routes
      Route::get('/doctor/all',[App\Http\Controllers\Admin\Doctor\ViewDoctorController::class,'index'])->middleware('admin')->name('doctors');
      Route::get('/doctor/add',[App\Http\Controllers\Admin\Doctor\AddDoctorController::class,'DoctorRegisterForm'])->middleware('admin')->name('doctor.add');
      Route::post('/doctor/add',[App\Http\Controllers\Admin\Doctor\AddDoctorController::class,'AddDoctor']);
      Route::get('/doctor/remove',[App\Http\Controllers\Admin\CloseBranchController::class,'ViewBranchList'])->middleware('admin')->name('branches');
      Route::post('/doctor/remove',[App\Http\Controllers\Admin\CloseBranchController::class,'CloseBranch']);

      //Patient->Admin Routes
      Route::get('/patient/all',[App\Http\Controllers\Admin\Patient\ViewPatientController::class,'index'])->middleware('admin')->name('Patients');
      Route::get('/patient/add',[App\Http\Controllers\Admin\Patient\AddPatientController::class,'PatientRegisterForm'])->middleware('admin')->name('patient.add');
      Route::post('/patient/add',[App\Http\Controllers\Admin\Patient\AddPatientController::class,'AddPatient']);
      Route::get('/patient/block',[App\Http\Controllers\Admin\BlockPatientController::class,'ViewPatientList'])->middleware('admin')->name('Patients');
      Route::post('/patient/block',[App\Http\Controllers\Admin\BlockPatientController::class,'BlockPatient']);
      

      //Department Admin Routes

      Route::get('/departments',[App\Http\Controllers\Admin\Department\DepartmentController::class,'index'])->middleware('admin')->name('Departments');
      Route::post('/departments',[App\Http\Controllers\Admin\Department\DepartmentController::class,'ControlDepartment'])->name('departments.add');
      //Login Routes
      Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('logout');
 

  
  
  
    });
    

 

      //Auth::routes();   
      
      // Socialite Authentication Routes

      Route::get('/auth/google', [App\Http\Controllers\Patient\Auth\GoogleController::class, 'redirectToGoogle']);
      Route::get('/auth/google/callback', [App\Http\Controllers\Patient\Auth\GoogleController::class, 'handleGoogleCallback']);

      Route::get('/auth/linkedin', [App\Http\Controllers\Patient\Auth\LinkedinController::class, 'redirectToLinkedin']);
      Route::get('/auth/linkedin/callback', [App\Http\Controllers\Patient\Auth\LinkedinController::class, 'handleLinkedinCallback']);




});
