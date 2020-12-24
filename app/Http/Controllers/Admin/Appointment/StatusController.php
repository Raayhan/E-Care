<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
class StatusController extends Controller
{
    public function ShowPage(){
        return view('admin.appointment.live');
    }


    public function ViewStatus(Request $request){
       
        $this->validator($request);
        $id = $request->input('appointment_id');

      
       
       
        $querry = Appointment::where('id', '=',$id)->first();
    
        if ($querry === null) {
            return redirect()->to('admin/appointment/live')->with('error','No record found with this ID');
        }
        else{
           
            $appointments = Appointment::where('id', '=',$id)->get(); 
       
            return view('admin.appointment.status',['appointments'=>$appointments]); 
        }
    }

    
    private function validator(Request $request)
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
