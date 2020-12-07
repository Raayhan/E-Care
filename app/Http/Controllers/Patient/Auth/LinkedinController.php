<?php

namespace App\Http\Controllers\Customer\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\Customer;

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
    
            $customer = Socialite::driver('linkedin')->user();
     
            $finduser = Customer::where('linkedin_id', $customer->id)->first();
     
            if($finduser){
     
                Auth::guard('customer')->login($finduser);
    
                return redirect('/customer/dashboard');
     
            }else{
                $newUser = Customer::create([
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'linkedin_id'=> $customer->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::guard('customer')->login($newUser);
     
                return redirect('/customer/profile/complete');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}
