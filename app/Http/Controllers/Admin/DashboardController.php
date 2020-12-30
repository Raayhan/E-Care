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
    public function index() // displays Admin dashboard page
    {
        
        $doctor = Doctor::count(); // Counts number of doctors
        $patient = Patient::count();//Counts number of patients
        $completed = Appointment::where('status', 'Completed')->count();//Counts number of completed appointments
        $pending = Appointment::where('status', 'Requested,Pending Approval')->count();//Counts number of pending requests
        
        return view('admin.dashboard',['doctor'=>$doctor,'patient'=>$patient,'pending'=>$pending,'completed'=>$completed]);
        //Return a view of the dashboard page with all the data as arrays
    }
}
