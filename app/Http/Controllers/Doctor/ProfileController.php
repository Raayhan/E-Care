<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Doctor;

class ProfileController extends Controller
{
    public function ShowPage(){
        return view('doctor.profile.password'); 
    }


    public function ChangePassword(Request $request){

        $this->PasswordValidator($request);        
        $id = $request->input('id');
        $oldpassword = $request->input('password');
        $newpassword = $request->input('Newpassword');
        $hash = Hash::make($newpassword);

        $doctor = Doctor::findOrFail($id);

        if (Hash::check($oldpassword, $doctor->password)) {
        
            $doctor->password = $hash;
            $doctor->save();
            return redirect()->to('/doctor/profile/password')->with('status','Password Changed');

        }
        else {
            return redirect()->to('/doctor/profile/password')->with('error','Incorrect Password');
        }
    }

    private function PasswordValidator(Request $request)
    {
            //validation rules.
            $rules = [
                
                'Newpassword' => 'required|min:6|max:255|confirmed',
                'password'    => 'required|min:6|max:255',
               
                
               
            ];

            //custom validation error messages.
            $messages = [
               
               
            ];
            

            //validate the request.
            $request->validate($rules,$messages);


    }
}
