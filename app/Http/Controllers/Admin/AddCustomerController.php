<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class AddCustomerController extends Controller
{
    
    public function CustomerRegisterForm(){
       
        return view('admin.customer.add',[
            
            'registerRoute' => 'admin.customer.add',
           
        ]);
    }


    public function AddCustomer(Request $request){

        $this->validator($request);


        $customer = new Customer;

        //Making the password Hashed
        $password = $request->input('password');
        $hash = Hash::make($password);

        // Insering data into database 

        $customer->name      = $request->input('name');
        $customer->email     = $request->input('email');
        $customer->address   = $request->input('address');
        $customer->phone     = $request->input('phone');
        $customer->password  = $hash;
        
        $customer->save();
    
          //redirect to page  
        
        return redirect()->to('/admin/customer/customers')->with('status','New Customer Added');

    }
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'      => 'required|string|min:3|max:191',
                'email'     => 'required|email|unique:customers|min:5|max:191',
                'password'  => 'required|string|confirmed|min:6|max:255',
                'phone'     => 'required|string|unique:customers|min:11|max:11',
                'address'   => 'required|string|min:15|max:255',
            ];

            //custom validation error messages.
            $messages = [
                
                'email.unique' => 'Email already exists',
                'phone.unique' => 'Phone number already exists',
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

}
