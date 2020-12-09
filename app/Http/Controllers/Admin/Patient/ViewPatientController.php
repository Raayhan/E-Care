<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewPatientController extends Controller
{
    public function index()
    {
        $patients = DB::table('patients')->select('id','name','age','gender','blood','address','email','phone')->get();

        return view('admin.patient.all',['patients'=>$patients]);
    }
}
