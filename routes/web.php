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
    Route::get('/messages',[App\Http\Controllers\Patient\MessageController::class,'ViewMessages'])->middleware('patient')->name('AllMessages');
      Route::get('/dashboard',[App\Http\Controllers\Patient\DashboardController::class,'index'])->name('dashboard')->middleware('patient');
     //Message Routes
   

      //Login Register Routes
      Route::get('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'PatientRegisterForm'])->name('register');
      Route::post('/register',[App\Http\Controllers\Patient\Auth\RegisterController::class,'RegisterPatient']);
      Route::get('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Patient\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Patient\Auth\LoginController::class,'logout'])->name('logout');
  

      //Profile Routes

      Route::get('/profile/complete',[App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteForm'])->name('CompleteForm')->middleware('patient');
      Route::post('/profile/complete', [App\Http\Controllers\Patient\Profile\CompleteProfileController::class,'CompleteProfile']);
      Route::get('/profile/settings',[App\Http\Controllers\Patient\Profile\ProfileController::class,'SettingsPage'])->middleware('patient')->name('Settings');
      Route::post('/profile/settings',[App\Http\Controllers\Patient\Profile\ProfileController::class,'ChangeInfo'])->middleware('patient')->name('ChangeAccount');
      Route::get('/profile/password',[App\Http\Controllers\Patient\Profile\ProfileController::class,'PasswordPage'])->middleware('patient')->name('Passwords');
      Route::post('/profile/password',[App\Http\Controllers\Patient\Profile\ProfileController::class,'ChangePassword'])->middleware('patient')->name('ChangePassword');
     // Department Routes

     Route::get('/department/all',[App\Http\Controllers\Patient\Department\DepartmentController::class,'index'])->name('Departments')->middleware('patient');
     Route::post('/department/all',[App\Http\Controllers\Patient\Department\DepartmentController::class,'FindDoctor'])->name('Doctors')->middleware('patient');
     Route::post('/department/doctors',[App\Http\Controllers\Patient\Doctor\DoctorController::class,'ConfirmAppointment'])->name('AppointmentConfirm')->middleware('patient');
     

     //Doctor Routes
     Route::get('/doctors/all',[App\Http\Controllers\Patient\Doctor\DoctorController::class,'index'])->name('AllDoctors')->middleware('patient');
     Route::post('/doctors/all',[App\Http\Controllers\Patient\Doctor\DoctorController::class,'ConfirmAppointment'])->name('ConfirmAppointment');

     //Appointment Routes
     Route::get('/appointments/confirm',[App\Http\Controllers\Patient\Doctor\DoctorController::class,'MakeAppointment'])->name('MakeAppointment')->middleware('patient');
     Route::get('/appointments/all',[App\Http\Controllers\Patient\Appointment\AppointmentController::class,'AllAppointments'])->name('Appointments')->middleware('patient');
     Route::get('/appointments/create',[App\Http\Controllers\Patient\Appointment\AppointmentController::class,'MakeAppointment'])->name('AppointmentCreate')->middleware('patient');
  
     Route::get('/appointments/view',[App\Http\Controllers\Patient\Appointment\AppointmentController::class,'ViewAppointment'])->name('Appointment')->middleware('patient');
     Route::get('/appointments/conversation',[App\Http\Controllers\Patient\Appointment\ConversationController::class,'ViewConversation'])->name('ViewConversation')->middleware('patient');
     Route::post('/appointments/conversation',[App\Http\Controllers\Patient\Appointment\ConversationController::class,'SendMessage'])->name('SendMessage')->middleware('patient');
     Route::get('/appointments/prescription',[App\Http\Controllers\Patient\Appointment\PrescriptionController::class,'ViewPrescription'])->name('ViewPrescription')->middleware('patient');
    
     //Report Routes
     Route::get('/reports/all',[App\Http\Controllers\Patient\ReportsController::class,'ViewReports'])->name('ViewReports')->middleware('patient');
     Route::get('/reports/view',[App\Http\Controllers\Patient\ReportsController::class,'ShowReport'])->name('ShowReport')->middleware('patient');

     //Medicine Routes
     Route::get('/medicines/all',[App\Http\Controllers\Patient\MedicineController::class,'AllMedicines'])->name('AllMedicines')->middleware('patient');
     Route::post('/medicines/all',[App\Http\Controllers\Patient\MedicineController::class,'CreateOrder'])->name('CreateOrder')->middleware('patient');
     Route::get('/medicines/checkout',[App\Http\Controllers\Patient\MedicineController::class,'Checkout'])->name('Checkout')->middleware('patient');

    });
  
  


  //All Doctor Routes


  
  Route::prefix('/doctor')->name('doctor.')->namespace('Doctor')->group(function(){

      Route::get('/dashboard',[App\Http\Controllers\Doctor\DashboardController::class,'index'])->middleware('doctor')->name('dashboard');
      Route::get('/prescriptions',[App\Http\Controllers\Doctor\PrescriptionController::class,'index'])->middleware('doctor')->name('prescriptions');
      Route::get('/prescription',[App\Http\Controllers\Doctor\PrescriptionController::class,'ViewPrescription'])->middleware('doctor')->name('prescription');
    
      //Login Routes
      Route::get('/login',[App\Http\Controllers\Doctor\Auth\LoginController::class,'showLoginForm'])->name('login');
      Route::post('/login',[App\Http\Controllers\Doctor\Auth\LoginController::class,'login']);
      Route::post('/logout',[App\Http\Controllers\Doctor\Auth\LoginController::class,'logout'])->name('logout');
  
      //Appointment Routes

      Route::get('/appointments/all',[App\Http\Controllers\Doctor\Appointment\AppointmentController::class,'AllAppointments'])->name('Appointments')->middleware('doctor');
      Route::get('/appointments/view',[App\Http\Controllers\Doctor\Appointment\AppointmentController::class,'ViewAppointment'])->name('Appointment')->middleware('doctor');
      Route::post('/appointments/view',[App\Http\Controllers\Doctor\Appointment\AppointmentController::class,'DeleteAppointment'])->name('DeleteAppointment')->middleware('doctor');
      Route::get('/appointments/conversation',[App\Http\Controllers\Doctor\Appointment\ConversationController::class,'ViewConversation'])->name('ViewConversation')->middleware('doctor');
      Route::post('/appointments/conversation',[App\Http\Controllers\Doctor\Appointment\ConversationController::class,'SendMessage'])->name('SendMessage')->middleware('doctor');
      Route::get('/appointments/requests',[App\Http\Controllers\Doctor\Appointment\AppointmentController::class,'ShowRequest'])->name('Requests')->middleware('doctor');
      Route::post('/appointments/requests',[App\Http\Controllers\Doctor\Appointment\AppointmentController::class,'RequestHandel'])->name('Handel')->middleware('doctor');
 
      Route::get('/appointments/prescription',[App\Http\Controllers\Doctor\Appointment\PrescriptionController::class,'CreatePrescription'])->middleware('doctor')->name('CreatePrescription');
      Route::post('/appointments/prescription',[App\Http\Controllers\Doctor\Appointment\PrescriptionController::class,'AddMedicine'])->name('AddMedicine');
    
      Route::get('/appointments/checkout',[App\Http\Controllers\Doctor\Appointment\CheckoutController::class,'ViewCheckout'])->middleware('doctor')->name('ViewCheckout');
      Route::post('/appointments/checkout',[App\Http\Controllers\Doctor\Appointment\CheckoutController::class,'EndAppointment'])->name('EndAppointment')->middleware('doctor');
    
      //Doctor-> Patient Routes
    Route::get('/patients/all',[App\Http\Controllers\Doctor\Patient\PatientController::class,'index'])->middleware('doctor')->name('Patients');
        
   
     //Messages Routes
    Route::get('/messages',[App\Http\Controllers\Doctor\MessageController::class,'ViewMessages'])->middleware('doctor')->name('Messages');
    Route::get('/history',[App\Http\Controllers\Doctor\HistoryController::class,'index'])->middleware('doctor')->name('History');
  
    Route::get('/reports',[App\Http\Controllers\Doctor\ReportsController::class,'index'])->middleware('doctor')->name('Report');
    Route::get('/profile/password',[App\Http\Controllers\Doctor\ProfileController::class,'ShowPage'])->middleware('doctor')->name('PasswordPage');
    Route::post('/profile/password',[App\Http\Controllers\Doctor\ProfileController::class,'ChangePassword'])->middleware('doctor')->name('changePass');
  
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
   
      Route::get('/doctor/remove',[App\Http\Controllers\Admin\Doctor\RemoveDoctorController::class,'index'])->middleware('admin')->name('RemoveDoctor');
      Route::post('/doctor/remove',[App\Http\Controllers\Admin\Doctor\RemoveDoctorController::class,'RemoveDoctor'])->middleware('admin')->name('RemoveDoctorAction');
      //Patient->Admin Routes
      Route::get('/patient/all',[App\Http\Controllers\Admin\Patient\ViewPatientController::class,'index'])->middleware('admin')->name('Patients');
      Route::get('/patient/add',[App\Http\Controllers\Admin\Patient\AddPatientController::class,'PatientRegisterForm'])->middleware('admin')->name('patient.add');
      Route::post('/patient/add',[App\Http\Controllers\Admin\Patient\AddPatientController::class,'AddPatient']);
      Route::get('/patient/block',[App\Http\Controllers\Admin\Patient\BlockPatientController::class,'index'])->middleware('admin')->name('patient.block');
      Route::post('/patient/block',[App\Http\Controllers\Admin\Patient\BlockPatientController::class,'BlockPatient'])->middleware('admin')->name('BlockPatient');
      

      //Department Admin Routes

      Route::get('/departments',[App\Http\Controllers\Admin\Department\DepartmentController::class,'index'])->middleware('admin')->name('Departments');
      Route::post('/departments',[App\Http\Controllers\Admin\Department\DepartmentController::class,'ControlDepartment'])->name('departments.add');
      
      //Appointment Admin Routes
      Route::get('/appointment/all',[App\Http\Controllers\Admin\Appointment\AppointmentController::class,'AllAppointments'])->name('Appointments')->middleware('admin');
      Route::get('/appointment/view',[App\Http\Controllers\Admin\Appointment\AppointmentController::class,'ViewAppointment'])->name('Appointment')->middleware('admin');
      Route::post('/appointment/view',[App\Http\Controllers\Admin\Appointment\AppointmentController::class,'DeleteAppointment'])->name('DeleteAppointment')->middleware('admin');
      Route::get('/appointment/request',[App\Http\Controllers\Admin\Appointment\AppointmentController::class,'ShowRequest'])->name('Requests')->middleware('admin');
      Route::post('/appointment/request',[App\Http\Controllers\Admin\Appointment\AppointmentController::class,'RequestHandel'])->name('Handel')->middleware('admin');
      Route::get('/appointment/live',[App\Http\Controllers\Admin\Appointment\StatusController::class,'ShowPage'])->name('ShowPage')->middleware('admin');
      Route::post('/appointment/live',[App\Http\Controllers\Admin\Appointment\StatusController::class,'ViewStatus'])->name('ViewStatus')->middleware('admin');
      // Medicine Routes

      Route::get('/medicines',[App\Http\Controllers\Admin\MedicineController::class,'index'])->name('ViewOrders')->middleware('admin');
      
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
