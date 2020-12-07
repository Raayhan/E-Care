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

      Route::get('/dashboard',[App\Http\Controllers\Patient\DashboardController::class,'index'])->middleware('patient')->name('dashboard');
    

      //Login Routes
      Route::get('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'PatientRegisterForm'])->name('register');
      Route::post('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'RegisterPatient']);
      Route::get('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Patient\Auth\LoginController::class,'logout'])->name('logout');
  

      //Profile Routes

      Route::get('/profile/complete',[App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteForm'])->middleware('patient')->name('CompleteForm');
      Route::post('/profile/complete', [App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteProfile']);
  
      //Parcel Routes

      Route::get('/parcel/request',[App\Http\Controllers\Patient\Parcel\RequestController::class,'ViewRequestForm'])->middleware('Patient')->name('RequestForm');
      Route::post('/parcel/request',[App\Http\Controllers\Patient\Parcel\RequestController::class,'ViewConfirmation'])->middleware('Patient')->name('Confirmation');
      Route::get('/parcel/confirm',[App\Http\Controllers\Patient\Parcel\RequestController::class,'MakePayment'])->middleware('Patient')->name('Payment');
      Route::get('/parcel/all',[App\Http\Controllers\Patient\Parcel\ViewParcelsController::class,'ViewAllParcel'])->middleware('Patient')->name('ViewAllParcel');
      Route::get('/parcel/view',[App\Http\Controllers\Patient\Parcel\ViewParcelsController::class,'ViewParcel'])->middleware('Patient')->name('ViewParcel');
      Route::post('/parcel/all',[App\Http\Controllers\Patient\Parcel\RequestController::class,'DeleteRequest'])->middleware('Patient');
      Route::post('/parcel/confirm',[App\Http\Controllers\Patient\Parcel\RequestController::class,'MakeRequest']);

      
      Route::get('/parcel/check',[App\Http\Controllers\Patient\Parcel\StatusController::class,'ShowPage'])->middleware('Patient')->name('ShowStatus');
      Route::post('/parcel/check',[App\Http\Controllers\Patient\Parcel\StatusController::class,'ViewStatus'])->middleware('Patient');
     
      //Operations Routes
      Route::get('/calculate',[App\Http\Controllers\Patient\Operations\CalculateController::class,'ViewPage'])->middleware('Patient')->name('ViewPage');
      Route::post('/calculate',[App\Http\Controllers\Patient\Operations\CalculateController::class,'Calculate'])->middleware('Patient')->name('Calculate');

  
    });
  
  


  //All Branch Routes


  
  Route::prefix('/branch')->name('branch.')->namespace('Branch')->group(function(){

      Route::get('/dashboard',[App\Http\Controllers\Branch\DashboardController::class,'index'])->middleware('branch')->name('dashboard');
    
      //Login Routes
      Route::get('/login',[App\Http\Controllers\Branch\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Branch\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Branch\Auth\LoginController::class,'logout'])->name('logout');
  
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
     
      //Branch Admin Routes
      Route::get('/branch/branches',[App\Http\Controllers\Admin\ViewBranchController::class,'index'])->middleware('admin')->name('branches');
      Route::get('/branch/add',[App\Http\Controllers\Admin\AddBranchController::class,'BranchRegisterForm'])->middleware('admin')->name('branch.add');
      Route::post('/branch/add',[App\Http\Controllers\Admin\AddBranchController::class,'AddBranch']);
      Route::get('/branch/close',[App\Http\Controllers\Admin\CloseBranchController::class,'ViewBranchList'])->middleware('admin')->name('branches');
      Route::post('/branch/close',[App\Http\Controllers\Admin\CloseBranchController::class,'CloseBranch']);

      //Patient Admin Routes
      Route::get('/Patient/Patients',[App\Http\Controllers\Admin\ViewPatientController::class,'index'])->middleware('admin')->name('Patients');
      Route::get('/Patient/add',[App\Http\Controllers\Admin\AddPatientController::class,'PatientRegisterForm'])->middleware('admin')->name('Patient.add');
      Route::post('/Patient/add',[App\Http\Controllers\Admin\AddPatientController::class,'AddPatient']);
      Route::get('/Patient/block',[App\Http\Controllers\Admin\BlockPatientController::class,'ViewPatientList'])->middleware('admin')->name('Patients');
      Route::post('/Patient/block',[App\Http\Controllers\Admin\BlockPatientController::class,'BlockPatient']);
      
      //Login Routes
      Route::get('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('logout');
 
      //Shipment Routes
      Route::get('/shipment/request',[App\Http\Controllers\Admin\Shipment\RequestController::class,'ShowRequest'])->name('ShowRequest')->middleware('admin');
      Route::post('/shipment/request',[App\Http\Controllers\Admin\Shipment\RequestController::class,'RequestHandel'])->middleware('admin');
      Route::get('/shipment/live',[App\Http\Controllers\Admin\Shipment\StatusController::class,'ShowPage'])->middleware('admin')->name('ShowStatus');
      Route::post('/shipment/live',[App\Http\Controllers\Admin\Shipment\StatusController::class,'ViewStatus']);
      Route::get('/shipment/all',[App\Http\Controllers\Admin\Shipment\ViewShipmentController::class,'ShowPage'])->name('ShowPage')->middleware('admin');
  
  
  
    });
    

 

      //Auth::routes();   
          

      Route::get('/auth/google', [App\Http\Controllers\Patient\Auth\GoogleController::class, 'redirectToGoogle']);
      Route::get('/auth/google/callback', [App\Http\Controllers\Patient\Auth\GoogleController::class, 'handleGoogleCallback']);

      Route::get('/auth/linkedin', [App\Http\Controllers\Patient\Auth\LinkedinController::class, 'redirectToLinkedin']);
      Route::get('/auth/linkedin/callback', [App\Http\Controllers\Patient\Auth\LinkedinController::class, 'handleLinkedinCallback']);




});
