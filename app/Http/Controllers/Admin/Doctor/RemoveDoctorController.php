<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemoveDoctorController extends Controller
{
    public function index(){
        $doctors = DB::table('doctors')->select('id','name','reg_no','designation','department','degree','gender','email','phone')->get();

        return view('admin.doctor.remove',['doctors'=>$doctors]);
    }

    public function RemoveDoctor(Request $request){
        $id = $request->input('id');
        $sql = DB::table('doctors')->where('id',$id)->delete();

        return redirect()->to('/admin/doctor/remove')->with('error','Doctor Profile has been deleted.');
    }
}
