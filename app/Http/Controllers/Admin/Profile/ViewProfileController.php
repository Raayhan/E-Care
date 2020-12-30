<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

use Hash;

class ViewProfileController extends Controller
{
    public function ViewProfile(){ // View Admin Settings page
 
        return view('admin.profile.view');
       
    }
    public function ViewPassword(){ // View admin password change page
        
        return view('admin.profile.password');
       
    }

    public function ChangeName(Request $request){ // Change admin Email and  Name function
        
        $this->Validator($request);    // Validator function    
        $id = $request->input('id'); // get the admin id
        $password = $request->input('password'); // Get the admin password
 

        $admin = Admin::findOrFail($id); // Checking the id

        if (Hash::check($password, $admin->password)) {  // If given password matches
        
            $admin->name = $request->input('name'); // Updating Admin Email and Name
            $admin->email= $request->input('email');
            $admin->save(); // Saving to the database
            return redirect()->to('/admin/profile/view')->with('status','Changes Saved'); // Redirecting to the previous page with session message

        }
        else { // If password does not matches 
            return redirect()->to('/admin/profile/view')->with('error','Incorrect Password');
            // Redirecting to the previous page with session error message
        }
       
   
    } 
      

    private function Validator(Request $request)
    {
            //validation rules.
            $rules = [
                
                'password'     => 'required|min:6|max:255',
                'email'        => 'required|email|min:5|max:191',
                'name'         => 'required|string|min:3|max:191',
                
               
            ];

            //custom validation error messages.
            $messages = [   
               
            ];

            //validate the request.
            $request->validate($rules,$messages);

    }


    public function ChangePassword(Request $request){ // Change password function
        
        $this->PasswordValidator($request);   //Validate the form     
        $id = $request->input('id'); // Get the admin id
        $oldpassword = $request->input('oldpassword'); // Get old password
        $newpassword = $request->input('password'); // Get new password
        $hash = Hash::make($newpassword); // Making new password hashed

        $admin = Admin::findOrFail($id); // checking for the admin id to the database

        if (Hash::check($oldpassword, $admin->password)) { // If old password matches
        
            $admin->password = $hash; // Inserting new password
            $admin->save(); // Saving into the database
            return redirect()->to('/admin/profile/password')->with('status','Password Changed');
           // Redirecting to the previous page with session message
        }
        else { // If old password does not matches
            return redirect()->to('/admin/profile/password')->with('error','Incorrect Password');
            // Redirecting to the previous page with session message
        }
       
   
    } 
      

    private function PasswordValidator(Request $request)
    {
            //validation rules.
            $rules = [
                
                'password'     => 'required|min:6|max:255|confirmed',
                'oldpassword'  => 'required|min:6|max:255',
               
            ];

            //custom validation error messages.
            $messages = [
               
               
            ];
            

            //validate the request.
            $request->validate($rules,$messages);


    }
}
