<?php

namespace App\Http\Controllers\admin;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class AddBranchController extends Controller
{
    public function BranchRegisterForm(){
        return view('admin.branch.add',[
            
            'registerRoute' => 'admin.branch.add',
           
        ]);
    }

    public function AddBranch(Request $request){

        $this->validator($request);


        $branch = new Branch;

        //Making the password Hashed
        $password = $request->input('password');
        $hash = Hash::make($password);

        // Insering data into database 

        $branch->name      = $request->input('name');
        $branch->email     = $request->input('email');
        $branch->branch_id = $request->input('branch_id');
        $branch->zone      = $request->input('zone');
        $branch->phone     = $request->input('phone');
        $branch->password  = $hash;
        $branch->save();
    
          //redirect to page  
        
        return redirect()->to('/admin/branch/branches')->with('status','New Branch Added');

    }
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'      =>'required|string|unique:branches|min:3|max:191',
                'email'     => 'required|email|unique:branches|min:5|max:191',
                'password'  => 'required|string|confirmed|min:6|max:255',
                'branch_id' => 'required|string|unique:branches|min:9|max:9',
                'phone'     => 'required|string|unique:branches|min:11|max:11',
            ];

            //custom validation error messages.
            $messages = [
                'name.unique' => 'Branch already exists',
                'email.unique' => 'Email already exists',
                'branch_id.unique' => 'Branch ID already exists',
                'phone.unique' => 'Phone already exists',
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
}
