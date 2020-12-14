<?php

namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AppointmentController extends Controller
{
 
    public function AllAppointments(){
        $patient_id = Auth::guard('patient')->user()->id;
        $appointments = DB::table('appointments')->where('patient_id',$patient_id)->select('id','doctor_name','doctor_designation','department_name','status','doctor_gender','created_at')->get();

      
        
            return view('patient.appointments.all',['appointments'=>$appointments]);
        
        

    }

    public function MakeAppointment(){
        return view('patient.appointments.create');
    }

    public function ViewAppointment(Request $request){


        $id = $request->input('appointment_id');
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();


        return view('patient.appointments.view',['appointments'=>$appointments]); 
    }

    public function DeleteAppointment(Request $request){

        $id = $request->input('id');

        $appointment = Appointment::findOrFail($id);
        DB::table('appointments')->where('id', '=', $id)->delete();
        return redirect()->to('/admin/appointments/all')->with('status','Appointment has been deleted.');
    }
}
