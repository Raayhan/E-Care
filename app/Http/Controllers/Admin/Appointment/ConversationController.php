<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function ViewConversation(Request $request){
        $id = $request->input('id');
        return view('patient.appointments.conversation',['id'=>$id]);
    }
}
