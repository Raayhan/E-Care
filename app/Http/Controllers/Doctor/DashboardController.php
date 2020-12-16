<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
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
        $doctor_id = Auth::guard('doctor')->user()->id;
        $appointments   = Appointment::where('doctor_id','=',$doctor_id)->count();
        $active         = Appointment::where('doctor_id','=',$doctor_id)->where('status','!=','Completed')->count();
        $completed      = Appointment::where('doctor_id','=',$doctor_id)->where('status','=','Completed')->count();
        return view('doctor.dashboard',['appointments'=>$appointments,'active'=>$active,'completed'=>$completed]);
    }
}
