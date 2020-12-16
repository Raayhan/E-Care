<?php

namespace App\Http\Controllers\Doctor\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class PatientController extends Controller
{
    public function index()
    {
        $doctor_id = Auth::guard('doctor')->user()->id;
        $patients = DB::table('appointments')->where('doctor_id',$doctor_id)->where('status','!=','Requested,Pending Approval')->select('patient_name','department_name','patient_age','patient_gender','patient_blood','id','status')->get();

        return view('doctor.patients.all',['patients'=>$patients]);
    }
}
