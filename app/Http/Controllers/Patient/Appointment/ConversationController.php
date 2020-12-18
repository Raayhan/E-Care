<?php

namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function ViewConversation(Request $request){
        
                
        $id = $request->input('id');
        $receiver = $request->input('doctor_name');
        $sql = DB::table('appointments')->where('id',$id)->where('status','Ready')->get();

        if ($sql->isEmpty()){
            return redirect()->back()->with('error','Doctor is not Ready. You will be able to send messages when the status is "Ready"');

        }
        else{
            $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
          
            return view('patient.appointments.conversation',['conversations'=>$conversations,'id'=>$id,'receiver'=>$receiver]);
        } 

      
    }
    public function SendMessage(Request $request){

       


        $conversation = new Conversation;

        $conversation->appointment_id = $request->input('appointment_id');
        $conversation->sender         = $request->input('sender');
        $conversation->receiver       = $request->input('receiver');
        $conversation->message        = $request->input('message');

        $conversation->save();
        $id = $request->input('appointment_id');
        $receiver = $request->input('receiver');
        $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
        return view('patient.appointments.conversation',['conversations'=>$conversations,'id'=>$id,'receiver'=>$receiver]);
    }

}
