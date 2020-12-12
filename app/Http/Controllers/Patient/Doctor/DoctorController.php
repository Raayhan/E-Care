<?php

namespace App\Http\Controllers\Patient\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->select('id','name','reg_no','designation','department','degree','gender')->get();

        return view('patient.doctors.all',['doctors'=>$doctors]);
    }


    public function ConfirmAppointment(Request $request){

         $doctor_id          = $request->input('doctor_id');
         $doctor_name        = $request->input('doctor_name');
         $doctor_designation = $request->input('doctor_designation');
         $doctor_reg         = $request->input('doctor_reg');
         $doctor_gender      = $request->input('doctor_gender');
         $department_name    = $request->input('department_name');
         $doctor_degree      = $request->input('doctor_degree');

         $appointment_id =101121+Appointment::count();
         return view('patient.appointments.confirm',
         [
         'doctor_id'=>$doctor_id,
         'doctor_name'=>$doctor_name,
         'doctor_designation'=>$doctor_designation,
         'doctor_reg'=>$doctor_reg,
         'doctor_gender'=>$doctor_gender,
         'department_name'=>$department_name,
         'doctor_degree'=>$doctor_degree,
         'appointment_id'=>$appointment_id
         ]);
         

         


    }

    public function MakeAppointment(Request $request){

        $appointment = new Appointment;
       
        $appointment->doctor_id          = $request->input('doctor_id');
        $appointment->doctor_name        = $request->input('doctor_name');
        $appointment->doctor_designation = $request->input('doctor_designation');
        $appointment->doctor_gender      = $request->input('doctor_gender');
        $appointment->department_name    = $request->input('department_name');
        $appointment->patient_id         = $request->input('patient_id');
        $appointment->patient_name       = $request->input('patient_name');
        $appointment->patient_age        = $request->input('patient_age');
        $appointment->patient_gender     = $request->input('patient_gender');
        $appointment->patient_blood      = $request->input('patient_blood');
        $appointment->status             = $request->input('status');


        $appointment->save();
        return redirect()->to('/patient/appointments/all')->with('status','Appointment request has been sent');
       

        

        


   }


}
