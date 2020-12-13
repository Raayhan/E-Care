<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function AllAppointments(){
       
        $appointments = DB::table('appointments')->get();

      
        
            return view('admin.appointment.all',['appointments'=>$appointments]);
        
        

    }
}
