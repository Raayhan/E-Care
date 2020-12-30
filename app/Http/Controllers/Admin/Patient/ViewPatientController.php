<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewPatientController extends Controller
{
    public function index() // Displays All patient information page
    {
        $patients = DB::table('patients')->select('id','name','age','gender','blood','address','email','phone')->get();
           // Select all patients from database
        return view('admin.patient.all',['patients'=>$patients]);
        //Passes all patient data as array to the view 
    }
}
