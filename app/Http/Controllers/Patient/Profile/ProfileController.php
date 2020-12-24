<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Hash;

class ProfileController extends Controller
{
    public function SettingsPage(){

        return view('patient.profile.settings');
    }


    public function ChangeInfo(Request $request){


        $this->Validator($request);        
        $id = $request->input('id');
        $password = $request->input('password');
 

        $patient = Patient::findOrFail($id);

        if (Hash::check($password, $patient->password)) {

            
            //Calculate age from date of Birth

            $dateOfBirth = $request->input('dob');
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            $age = $diff->format('%y');
        
            $patient->name      = $request->input('name');
            $patient->email     = $request->input('email');
            $patient->gender    = $request->input('gender');  // Getting all the inputs from user
            $patient->dob       = $request->input('dob');
            $patient->age       = $age;
            $patient->blood     = $request->input('blood');
            $patient->phone     = $request->input('phone');
            $patient->address   = $request->input('address');
            $patient->save();
            return redirect()->to('/patient/profile/settings')->with('status','Changes Saved');

        }
        else {
            return redirect()->to('/patient/profile/settings')->with('error','Incorrect Password');
        }

    }

    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'      => 'required|string|min:3|max:191',
                'email'     => 'required|email|min:5|max:191',
                'password'  => 'required|string|min:6|max:255',
                'address'   => 'required|string|min:15|max:255',
                'phone'     => 'required|string|min:11|max:11',
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
