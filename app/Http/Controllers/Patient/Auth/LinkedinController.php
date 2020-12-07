<?php

namespace App\Http\Controllers\Patient\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\Patient;

class LinkedinController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleLinkedinCallback()
    {
        try {
    
            $patient = Socialite::driver('linkedin')->user();
     
            $finduser = Patient::where('linkedin_id', $patient->id)->first();
     
            if($finduser){
     
                Auth::guard('patient')->login($finduser);
    
                return redirect('/patient/dashboard');
     
            }else{
                $newUser = Patient::create([
                    'name' => $patient->name,
                    'email' => $patient->email,
                    'linkedin_id'=> $patient->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::guard('patient')->login($newUser);
     
                return redirect('/patient/profile/complete');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}
