<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
class CompleteProfileController extends Controller
{
    /* If a user signup using Google or Linkedin ID , Additional informations 
    are required to be filled during the registration. This function will get 
    those informations and save it to the Patient Database. */
    
    public function CompleteForm()
    {   
        
        return view('patient.profile.complete'); // Display the Profile Complete form
    }

    public function CompleteProfile(Request $request)
    {

        $this->validator($request);

        $id = $request->input('id');
        
        $patient = Patient::findOrFail($id);
        
        //Calculate age from date of Birth

        $dateOfBirth = $request->input('dob');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');

        $patient->phone   = $request->input('phone');
        $patient->address = $request->input('address');   // Getting user inputs
        $patient->dob     = $request->input('dob');
        $patient->age     = $age;
        $patient->blood   = $request->input('blood');
        $patient->gender  = $request->input('gender');
        

       

        $patient->save();  // Saved to the Database 

        return redirect()->to('/patient/dashboard')->with('status','Profile Updated'); // Redirect to dashboard after complete
    }
   
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                
                'phone'     => 'required|string|unique:patients|min:11|max:11',
                'address'   => 'required|string|min:15|max:255',
                'blood'     => 'required',
                'dob'       => 'required',
                'gender'    => 'required',
            ];

            //custom validation error messages.
            $messages = [
               
                'phone.unique' => 'Phone number already exists',
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

}
