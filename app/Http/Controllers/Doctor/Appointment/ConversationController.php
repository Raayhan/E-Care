<?php

namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function ViewConversation(Request $request){
        
                
        $id = $request->input('id');
     
        $sql = DB::table('appointments')->where('id',$id)->where('status','Ready')->get();
        if ($sql->isEmpty()){
            return redirect()->back()->with('error','Please approve patient request to send messages.');

        }
        else{
            $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
            return view('doctor.appointments.conversation',['conversations'=>$conversations,'id'=>$id]);
        } 
        
        return view('doctor.appointments.conversation',['conversations'=>$conversations,'id'=>$id]);
        

      
    }
    public function SendMessage(Request $request){

        $conversation = new Conversation;

        $conversation->appointment_id = $request->input('appointment_id');
        $conversation->sender_name    = $request->input('sender_name');
        $conversation->message        = $request->input('message');

        $conversation->save();
        $id = $request->input('appointment_id');
        $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
        return view('doctor.appointments.conversation',['conversations'=>$conversations,'id'=>$id]);
    }

}
