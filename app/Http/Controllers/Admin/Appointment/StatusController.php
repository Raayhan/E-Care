<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;


class StatusController extends Controller
{
    
    
    public function ShowPage(){
        //Displays Status Page
        return view('admin.appointment.live');
    }


    public function ViewStatus(Request $request){
       
        $this->validator($request); // Validator function for the form
       
        $number = $request->input('appointment_id'); // Get the appointment id input

        $id = substr($number, 5); // Remove 1st 5 digit from the input
      
        $querry = Appointment::where('id', '=',$id)->first(); //Check if the id is available in database
    
        if ($querry === null) { // if not available
           
            return redirect()->to('admin/appointment/live')->with('error','No record found with this ID');
        }
        else{ // if available
           
            $appointments = Appointment::where('id', '=',$id)->get(); // Select table data from the database
       
            return view('admin.appointment.status',['appointments'=>$appointments]); //Return as Array to the view
        }
    }

    
    private function validator(Request $request) // Validator Function
    {
            //validation rules.
            $rules = [
                'appointment_id'      =>'required|numeric|min:6',
               
            ];

            //custom validation error messages.
            $messages = [
                'appointment_id.min' => 'ID Should be at least 6 Characters'
                
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
}
