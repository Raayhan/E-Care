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

        $doctors = DB::table('doctors')->select('id','name','reg_no','designation','department','degree','gender')->where('department', '=',$department)->get();
  
        if ($doctors->isEmpty()){
            return redirect()->to('/patient/department/all')->with('error','Sorry, currently no doctors available for this department. Contact us for more informations.');
        }
        else{
            return view('patient.department.doctors',['doctors'=>$doctors,'department'=>$department]);
        }

        

    }
}
