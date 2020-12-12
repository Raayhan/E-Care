<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patient_id = Auth::guard('patient')->user()->id;
        $doctor     = Doctor::count();
        $department = Department::count();
        $active     = Appointment::where('patient_id','=',$patient_id)->where('status','!=','Completed')->count();
        $completed  = Appointment::where('patient_id','=',$patient_id)->where('status','=','Completed')->count();
        return view('patient.dashboard',['doctor'=>$doctor,'department'=>$department,'active'=>$active,'completed'=>$completed]); //Returns a view to the Patient Dashboard page
    }
}
