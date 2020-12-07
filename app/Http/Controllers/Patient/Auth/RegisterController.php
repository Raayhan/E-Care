<?php

namespace App\Http\Controllers\Patient\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Admin;
use Hash;
use Auth;

class RegisterController extends Controller
{
    
    public function PatientRegisterForm(){     // This function will display the registration form
       
       
        /* Checking if a user is logged in there will be no need to display register page */

        //User will be redirected to their dashboard if already logged in.

        if((Auth::guard('patient')->check())){
            return redirect()
            ->intended(route('patient.dashboard'))
            ->with('status','You are already registered as patient!');
        }
        elseif((Auth::guard('doctor')->check())){
            return redirect()
            ->intended(route('doctor.dashboard'))
            ->with('status','You are logged in as a doctor.');
        }
        elseif((Auth::guard('admin')->check())){
            return redirect()
            ->intended(route('admin.dashboard'))
            ->with('status','You are logged in as an Admin.');
        }
    
    else{
      

        //If user is not logged in Register page will be served
      
      
        return view('patient.register',[
            
            'registerRoute' => 'patient.register',
           
        ]);
    }
    }
    public function RegisterPatient(Request $request){

        $this->validator($request);


        $patient = new Patient;

        //Making the password Hashed
        $password = $request->input('password'); // Encrypting the password for security  
        $hash = Hash::make($password);

        // Insering data into database 

        $patient->name      = $request->input('name');
        $patient->email     = $request->input('email');
        $patient->gender    = $request->input('gender');  // Getting all the inputs from user
        $patient->dob       = $request->input('dob');
        $patient->blood     = $request->input('blood');
        $patient->phone     = $request->input('phone');
        $patient->address   = $request->input('address');
        $patient->password  = $hash;
        $patient->save();
    
          //redirect to dashboard 
        
        return redirect()->to('/patient/dashboard')->with('status','Patient Registered Successfully');

    }
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'      => 'required|string|min:3|max:191',
                'email'     => 'required|email|unique:patients|min:5|max:191',
                'password'  => 'required|string|confirmed|min:6|max:255',
                'address'   => 'required|string|min:15|max:255',
                'phone'     => 'required|string|unique:patients|min:11|max:11',
                'blood'     => 'required',
                'dob'       => 'required',
                'gender'    => 'required',
            ];

            //custom validation error messages.
            $messages = [
                
                'email.unique' => 'Email already exists',
                'phone.unique' => 'Phone already exists',
 
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
   




}
