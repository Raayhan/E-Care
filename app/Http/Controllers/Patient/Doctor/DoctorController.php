<?php

namespace App\Http\Controllers\Patient\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->select('name','reg_no','designation','department','degree','gender')->get();

        return view('patient.doctors.all',['doctors'=>$doctors]);
    }
}
