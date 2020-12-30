<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockPatientController extends Controller
{
    public function index(){ // displays block patient page
       
        $patients = DB::table('patients')->select('id','name','age','gender','blood','address','email','phone')->get();
         // Selects all patients from database and displays to the datatables
        return view('admin.patient.block',['patients'=>$patients]);
        //Retruns a view of the page with patients data as array

    }


    public function BlockPatient(Request $request){ // Block patient function

        $id = $request->input('id');// Get the patient id
        $sql = DB::table('patients')->where('id',$id)->delete();// delete the patient from database using id

        return redirect()->to('/admin/patient/block')->with('error','Patient Profile has been deleted.');
         // Redirect to the previous page with session message
    }
}
