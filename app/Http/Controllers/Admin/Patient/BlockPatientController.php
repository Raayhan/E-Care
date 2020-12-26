<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockPatientController extends Controller
{
    public function index(){
        $patients = DB::table('patients')->select('id','name','age','gender','blood','address','email','phone')->get();

        return view('admin.patient.block',['patients'=>$patients]);

    }
    public function BlockPatient(Request $request){

        $id = $request->input('id');
        $sql = DB::table('patients')->where('id',$id)->delete();

        return redirect()->to('/admin/patient/block')->with('error','Patient Profile has been deleted.');

    }
}
