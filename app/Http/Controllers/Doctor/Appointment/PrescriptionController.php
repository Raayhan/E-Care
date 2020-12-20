<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Medicine;

class PrescriptionController extends Controller
{
    public function CreatePrescription(Request $request){
     
        $id = $request->input('id');
        $appointments = DB::table('appointments')->where('id',$id)->where('status','Ready')->get();
        if ($appointments->isEmpty()){
            return redirect()->back()->with('error','Prescription page is not available for now');

        }
        else{
        
        return view('doctor.appointments.prescription',['appointments'=>$appointments]);
    }
   }

    public function AddMedicine(Request $request){

        $medicine = new Medicine;
        
        $medicine->appointment_id = $request->input('appointment_id');
        $medicine->name           = $request->input('name');
        $medicine->doctor_name    = $request->input('doctor_name');
        $medicine->patient_id     = $request->input('patient_id');
        $medicine->type           = $request->input('type');
        $medicine->dosage         = $request->input('dosage');
        
        $days                     = $request->input('frequency');

        $daysArray = array();

        foreach($days as $day){
          $daysArray[] = $day;
         }

        $medicine->frequency      = json_encode($daysArray);
        $medicine->duration       = $request->input('duration');

        $medicine->save();

        $id = $request->input('appointment_id');
        $appointments = DB::table('appointments')->where('id',$id)->get();
        
        
        return view('doctor.appointments.prescription')->with('appointments',$appointments)->with('status','Medicine has been prescribed.');

    }
}
