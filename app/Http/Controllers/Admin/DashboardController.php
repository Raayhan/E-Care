<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;


class DashboardController extends Controller
{
   


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $doctor = Doctor::count();
        $patient = Patient::count();
        $completed = Appointment::where('status', 'Completed')->count();
        $pending = Appointment::where('status', 'Requested,Pending Approval')->count();
        // return view('admin.dashboard',['branch'=>$branch,'customer'=>$customer,'completed'=>$completed,'pending'=>$pending]);
        return view('admin.dashboard',['doctor'=>$doctor,'patient'=>$patient,'pending'=>$pending,'completed'=>$completed]);
    }
}
