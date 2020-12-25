<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PrescriptionController extends Controller
{
    public function index(){

        $doctor_id    = Auth::guard('doctor')->user()->id;
        $appointments = DB::table('appointments')->where('doctor_id',$doctor_id)->where('status','!=','Requested,Pending Approval')->where('status','!=','Approved')->select('id','patient_name','patient_age','patient_gender','patient_blood','department_name','status','created_at')->get();

      
        
            return view('doctor.prescriptions',['appointments'=>$appointments]);
    }

    public function viewPrescription(Request $request){

        $id = $request->input('id');

        $medicines = DB::table('medicines')->where('appointment_id', '=',$id)->get();
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();
        
        return view('doctor.prescription',['medicines'=>$medicines,'appointments'=>$appointments]);
    }
}
