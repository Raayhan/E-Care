<?php

namespace App\Http\Controllers\Admin\Doctor;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewDoctorController extends Controller
{
    public function index()
    {
        $doctors = DB::table('doctors')->select('name','reg_no','designation','department','degree','gender','email','phone')->get();

        return view('admin.doctor.all',['doctors'=>$doctors]);
    }
}
