<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use Auth;

class AppointmentController extends Controller
{
    public function AllAppointments(){
        $doctor_id    = Auth::guard('doctor')->user()->id;
        $appointments = DB::table('appointments')->where('doctor_id',$doctor_id)->where('status','!=','Requested,Pending Approval')->where('status','!=','Approved')->select('id','patient_name','patient_age','patient_gender','patient_blood','department_name','status','created_at')->get();

      
        
            return view('doctor.appointments.all',['appointments'=>$appointments]);
        
        

    }
    public function ViewAppointment(Request $request){


        $id = $request->input('appointment_id');
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();


        return view('doctor.appointments.view',['appointments'=>$appointments]); 
    }

    public function ShowRequest(){
        $doctor_id    = Auth::guard('doctor')->user()->id;
        $requests = DB::table('appointments')->where('doctor_id',$doctor_id)->where('status', '=','Approved')->get();
        
        if ($requests->isEmpty()){
            return redirect()->to('/doctor/appointments/all')->with('error','No Pending Requests Available.');
        }
        else{
            return view('doctor.appointments.requests',['requests'=>$requests]); 
        }
       
    }
    public function RequestHandel(Request $request){

        if ($request->has('Approve')) {
           
            $id = $request->input('id');
            
            $appointment = Appointment::findOrFail($id);

            $appointment->status = 'Ready';
           
            $appointment->save();
            return redirect()->to('/doctor/appointments/requests')->with('status','Request has been approved');


        }
        
        if ($request->has('Decline')) {
            
            $id = $request->input('id');
            $appointment = Appointment::findOrFail($id);

            $appointment->status = 'Declined by Doctor';
            $aapointment->save();
            return redirect()->to('/doctor/appointments/requests')->with('error','Request has been declined');

        }
     }
     public function DeleteAppointment(Request $request){

        $id = $request->input('id');

        $appointment = Appointment::findOrFail($id);
        DB::table('appointments')->where('id', '=', $id)->delete();
        DB::table('conversations')->where('appointment_id', '=', $id)->delete();
        return redirect()->to('/patient/appointments/all')->with('status','Appointment has been deleted.');
    }
 

}
