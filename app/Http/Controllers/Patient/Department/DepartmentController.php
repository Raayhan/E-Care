<?php

namespace App\Http\Controllers\Patient\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;


class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')->select('id','name')->get();
        
        return view('patient.department.all',['departments'=>$departments]);
    }

    public function FindDoctor(Request $request){

        $department      = $request->input('name');

        $doctors = DB::table('doctors')->select('name','reg_no','designation','department','degree','gender')->where('department', '=',$department)->get();
  

        return view('patient.department.doctors',['doctors'=>$doctors,'department'=>$department]);

    }
}