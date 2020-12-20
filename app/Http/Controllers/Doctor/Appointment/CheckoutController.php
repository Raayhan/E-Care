<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;

class CheckoutController extends Controller
{
    public function ViewCheckout(Request $request){
        $id = $request->input('id');

        $medicines = DB::table('medicines')->where('appointment_id', '=',$id)->get();
        $appointments = DB::table('appointments')->where('id', '=',$id)->get();
        
        return view('doctor.appointments.checkout',['medicines'=>$medicines,'appointments'=>$appointments]);
    }

    public function EndAppointment(Request $request){

        $id = $request->input('appointment_id');
        $appointment = Appointment::findOrFail($id);

        $appointment->status = 'Completed';
       
        $appointment->save();
       
        return redirect()->to('/doctor/appointments/all')->with('status','Appointment has been completed');
    }
}
