<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemoveDoctorController extends Controller
{
    public function index(){ // Displays remove doctor page

        $doctors = DB::table('doctors')->select('id','name','reg_no','designation','department','degree','gender','email','phone')->get();
        // Selects all doctors from the database
        return view('admin.doctor.remove',['doctors'=>$doctors]); // Passes the doctors as array to the view
    }

    public function RemoveDoctor(Request $request){
        //Remove doctor function
       
        $id = $request->input('id'); // Getting the id of the doctor
        $sql = DB::table('doctors')->where('id',$id)->delete(); // Deleting from the database

        return redirect()->to('/admin/doctor/remove')->with('error','Doctor Profile has been deleted.');
         // Redirecting to the previous page with session message
    }
}
