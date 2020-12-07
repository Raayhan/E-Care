<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Branch;
use Hash;

class ViewProfileController extends Controller
{
    public function ViewProfile(){
        $completed = Branch::sum('completed');
        $pending = Branch::sum('pending');
        return view('admin.profile.view',['completed'=>$completed,'pending'=>$pending]);
       
    }
    public function ViewPassword(){
        
        return view('admin.profile.password');
       
    }

    public function ChangeName(Request $request){
        
        $this->Validator($request);        
        $id = $request->input('id');
        $password = $request->input('password');
 

        $admin = Admin::findOrFail($id);

        if (Hash::check($password, $admin->password)) {
        
            $admin->name = $request->input('name');
            $admin->email= $request->input('email');
            $admin->save();
            return redirect()->to('/admin/profile/view')->with('status','Changes Saved');

        }
        else {
            return redirect()->to('/admin/profile/view')->with('error','Incorrect Password');
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


    public function ChangePassword(Request $request){
        
        $this->PasswordValidator($request);        
        $id = $request->input('id');
        $oldpassword = $request->input('oldpassword');
        $newpassword = $request->input('password');
        $hash = Hash::make($newpassword);

        $admin = Admin::findOrFail($id);

        if (Hash::check($oldpassword, $admin->password)) {
        
            $admin->password = $hash;
            $admin->save();
            return redirect()->to('/admin/profile/password')->with('status','Password Changed');

        }
        else {
            return redirect()->to('/admin/profile/password')->with('error','Incorrect Password');
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
