<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Patient;
class PagesController extends Controller
{
 
    //Index Page
    /* If a user is already logged in, after clicking the top logo
         he/she will be redirected to the dashboard page */
    
    
    // If a user is not logged in , after clicking the top logo 
    // he/she will be redirected to the welcome page

    public function index(){
        if((Auth::guard('patient')->check())) {
            return redirect('/patient/dashboard');
        }
        elseif((Auth::guard('doctor')->check())){
            return redirect('/doctor/dashboard');
        }
        elseif((Auth::guard('admin')->check())){
             
            return redirect('/admin/dashboard');
        }
        else{
            return view('welcome');
        } 
        
    }


 
    //About Page


    public function about(){
       
        return view('pages.about');
    }


    // Services Page



    public function services(){
        
        return view('pages.services');
    }
    

    //Login Page



   public function login(){
        
            return view('login');
        } 
        
    //Contact Page
    public function contact(){
        
        return view('pages.contact');
    }
    
  
    
}
