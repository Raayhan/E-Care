<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function AllAppointments(){
       
        $appointments = DB::table('appointments')->get();

      
        
            return view('admin.appointment.all',['appointments'=>$appointments]);
        
        

    }

    public function ShowRequest(){
        $appointments = DB::table('appointments')->where('status', '=','Requested,Pending Approval')->get();
        
        if ($appointments->isEmpty()){
            return redirect()->to('/admin/appointment/all')->with('error','No Pending Requests Available.');
        }
        else{
            return view('admin.appointment.request',['appointments'=>$appointments]); 
        }
       
    }

    public function RequestHandel(Request $request){

        if ($request->has('approve')) {
           
            $id = $request->input('id');
            
            $appointment = Appointment::findOrFail($id);

            $appointment->status = 'Approved';
           
            $appointment->save();
            return redirect()->to('/admin/appointment/request')->with('status','Request has been approved');


        }
        
        if ($request->has('decline')) {
            
            $id = $request->input('id');
            $appointment = Appointment::findOrFail($id);

            $appointment->status = 'Declined by Admin';
            $aapointment->save();
            return redirect()->to('/admin/appointment/request')->with('error','Request has been declined');

        }

 


    }

    public function ViewAppointment(Request $request){


        $id = $request->input('appointment_id');
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();


        return view('admin.appointment.view',['appointments'=>$appointments]); 
    }

    public function DeleteAppointment(Request $request){

        $id = $request->input('id');

        $appointment = Appointment::findOrFail($id);
        DB::table('appointments')->where('id', '=', $id)->delete();
        DB::table('conversations')->where('appointment_id', '=', $id)->delete();
        return redirect()->to('/admin/appointment/all')->with('status','Appointment has been deleted.');
    }

}
