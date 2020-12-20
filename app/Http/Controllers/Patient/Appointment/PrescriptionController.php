<?php

namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function ViewPrescription(Request $request){

        $id = $request->input('id');

        $medicines = DB::table('medicines')->where('appointment_id', '=',$id)->get();
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();
        
        return view('patient.appointments.prescription',['medicines'=>$medicines,'appointments'=>$appointments]);

    }
}
