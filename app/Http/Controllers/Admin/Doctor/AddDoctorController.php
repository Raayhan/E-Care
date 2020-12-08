<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class AddDoctorController extends Controller
{
    public function DoctorRegisterForm(){
        return view('admin.doctor.add',[
            
            'registerRoute' => 'admin.doctor.add',
           
        ]);
    }

    public function AddDoctor(Request $request){

        $this->validator($request);


        $doctor = new Doctor;

        //Making the password Hashed
        $password = $request->input('password');
        $hash = Hash::make($password);

        // Insering data into database 

        $doctor->name          = $request->input('name');
        $doctor->email         = $request->input('email');
        $doctor->designation   = $request->input('designation');
        $doctor->department    = $request->input('department');
        $doctor->degree        = $request->input('degree');
        $doctor->reg_no        = $request->input('reg_no');
        $doctor->gender        = $request->input('gender');
        $doctor->phone         = $request->input('phone');
        $doctor->password      = $hash;
        $doctor->save();
    
          //redirect to page  
        
        return redirect()->to('/admin/doctor/all')->with('status','New doctor profile  has been created successfully');

    }
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'        => 'required|string|min:3|max:191',
                'email'       => 'required|email|unique:doctors|min:5|max:191',
                'password'    => 'required|string|confirmed|min:6|max:255',
                'reg_no'      => 'required|unique:doctors|min:4|max:6',
                'phone'       => 'required|string|unique:doctors|min:11|max:11',
                'designation' => 'required|string',
                'department'  => 'required|string',
                'gender'      => 'required|string',
                'degree'      => 'required|string',

            ];

            //custom validation error messages.
            $messages = [
                'email.unique'  => 'Email already exists',
                'reg_no.unique' => 'Registration No. already exists',
                'reg_no.min'    => 'Registration No. Should be at least 4 digits',
                'reg_no.max'    => 'Registration No. Should not exceed 6 digits',
                'phone.unique'  => 'Phone already exists',
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
}
