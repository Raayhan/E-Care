<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
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
        $doctor     = Doctor::count();
        $department = Department::count();
        return view('patient.dashboard',['doctor'=>$doctor,'department'=>$department]); //Returns a view to the Patient Dashboard page
    }
}
