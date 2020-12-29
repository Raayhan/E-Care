<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function AllAppointments(){
       
        //Displays All Appointments in a Data Table

        $appointments = DB::table('appointments')->get(); // Selects all appointments from database

        return view('admin.appointment.all',['appointments'=>$appointments]); // Returns a view of all appointments

    }


    public function ShowRequest(){
        
        // Displays Appointment Request from patients

        $appointments = DB::table('appointments')->where('status', '=','Requested,Pending Approval')->get();
        //Selects all tables from appointments where status is Requested,Pending Approval
        
        
        if ($appointments->isEmpty()){
            
            //if no result found
            return redirect()->to('/admin/appointment/all')->with('error','No Pending Requests Available.');
        }
        else{
            //If result found 
            return view('admin.appointment.request',['appointments'=>$appointments]); 
        }
       
    }

    public function RequestHandel(Request $request){

        //Respond to Appointment request from patients

        if ($request->has('approve')) { //If Approve button is clicked
           
            $id = $request->input('id'); // Get the appointment id
            
            $appointment = Appointment::findOrFail($id); // Search for the id

            $appointment->status = 'Approved'; // Change the status of the appointment
           
            $appointment->save(); // save in database

            return redirect()->to('/admin/appointment/request')->with('status','Request has been approved');

            // Return view with Session message

        }
        
        if ($request->has('decline')) { // If Decline button is clicked
            
            $id = $request->input('id'); // Get the appointment id
            
            $appointment = Appointment::findOrFail($id); // Search for the id

            $appointment->status = 'Declined by Admin'; // Change the status
            
            $appointment->save(); //Save in database

            return redirect()->to('/admin/appointment/request')->with('error','Request has been declined');

            //Return view with Session message
        }

 


    }

    public function ViewAppointment(Request $request){ // View an appointment details


        $id = $request->input('appointment_id'); //Get the appointment id

        $appointments = DB::table('appointments')->where('id', '=',$id)->get(); // Select the table from database


        return view('admin.appointment.view',['appointments'=>$appointments]); //Return view with the table data
      }



    public function DeleteAppointment(Request $request){ // Deletes an appointment

        $id = $request->input('id'); // Get the appointment id

        $appointment = Appointment::findOrFail($id); // Search for the id

        DB::table('appointments')->where('id', '=', $id)->delete(); // deleting from database

        DB::table('conversations')->where('appointment_id', '=', $id)->delete(); // deleting the conversations

        return redirect()->to('/admin/appointment/all')->with('status','Appointment has been deleted.');
        
        //Return view with session message
    }

}
