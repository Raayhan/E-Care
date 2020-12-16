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
        $sql = DB::table('appointments')->where('id',$id)->where('status','Ready')->get();

        if ($sql->isEmpty()){
            return redirect()->back()->with('error','Doctor is not Ready. Visit doctor when the status is "Ready"');

        }
        else{
            $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
            return view('patient.appointments.conversation',['conversations'=>$conversations,'id'=>$id]);
        } 

      
    }
    public function SendMessage(Request $request){

        $conversation = new Conversation;

        $conversation->appointment_id = $request->input('appointment_id');
        $conversation->sender_name    = $request->input('sender_name');
        $conversation->message        = $request->input('message');

        $conversation->save();
        $id = $request->input('appointment_id');
        $conversations = DB::table('conversations')->where('appointment_id', '=',$id)->get();
        return view('patient.appointments.conversation',['conversations'=>$conversations,'id'=>$id]);
    }

}
