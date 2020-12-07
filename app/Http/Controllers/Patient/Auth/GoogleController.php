<?php

namespace App\Http\Controllers\Patient\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\Patient;


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect(); // Using socialite driver for redirecting to the google
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $patient = Socialite::driver('google')->user();
     
            $finduser = Patient::where('google_id', $patient->id)->first();
     

            /*If there is already an account using the google id user will
            be redirected to the dashboard directly*/


            if($finduser){
     
                Auth::guard('patient')->login($finduser);
    
                return redirect('/patient/dashboard');
     
               /* If there is no existing account using the google id A new account will be created */ 

            }else{
                $newUser = Patient::create([
                    'name' => $patient->name,
                    'email' => $patient->email,
                    'google_id'=> $patient->id,
                    'password' => encrypt('123456dummy')
                ]);
                
                Auth::guard('patient')->login($newUser); // Login the user
     
                return redirect('/patient/profile/complete'); // redirecting the Complete profile page
            }
    
        } catch (Exception $e) {
            dd($e->getMessage()); // Catching Exceptions
        }
    }
}
