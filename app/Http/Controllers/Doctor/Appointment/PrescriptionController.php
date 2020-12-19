<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function CreatePrescription(Request $request){
     
        $id = $request->input('id');
        $appointments = DB::table('appointments')->where('id',$id)->get();
        
        return view('doctor.appointments.prescription',['appointments'=>$appointments]);
    }
}
