<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;

class MessageController extends Controller
{
    public function ViewMessages(){
        $messages = DB::table('conversations')->get();
        return view('doctor.messages',['messages'=>$messages]);
    }


}
