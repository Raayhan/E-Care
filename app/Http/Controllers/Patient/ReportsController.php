<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ReportsController extends Controller
{
    public function ViewReports(){
        
        $patient_id = Auth::guard('patient')->user()->id;
        $appointments = DB::table('appointments')->where('patient_id',$patient_id)->where('status','Completed')->get();

      
        
            return view('patient.reports.all',['appointments'=>$appointments]);
        
    }


    public function ShowReport(Request $request){
        $id = $request->input('appointment_id');

        $medicines = DB::table('medicines')->where('appointment_id', '=',$id)->get();
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();
        
        return view('patient.reports.view',['medicines'=>$medicines,'appointments'=>$appointments]);
    }
}
