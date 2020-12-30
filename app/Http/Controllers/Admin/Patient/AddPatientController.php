<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class AddPatientController extends Controller
{
    public function PatientRegisterForm(){ // Displays Patient Registration form page
        return view('admin.patient.add',[
            
            'registerRoute' => 'admin.patient.add',
           
        ]);
    }

    public function AddPatient(Request $request){

        $this->validator($request); // Validator function to validate the form


        $patient = new Patient; // Creating new Patient model object

        //Making the password Hashed
        $password = $request->input('password'); // Encrypting the password for security  
        $hash = Hash::make($password);

        //Calculate age from date of Birth

        $dateOfBirth = $request->input('dob');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');

        // Insering data into database 

        $patient->name      = $request->input('name');
        $patient->email     = $request->input('email');
        $patient->gender    = $request->input('gender');  // Getting all the inputs from user
        $patient->dob       = $request->input('dob');
        $patient->age       = $age;
        $patient->blood     = $request->input('blood');
        $patient->phone     = $request->input('phone');
        $patient->address   = $request->input('address');
        $patient->password  = $hash;
        $patient->save();
    
          //redirect to page  
        
        return redirect()->to('/admin/patient/all')->with('status','New Patient account  has been created successfully');

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
