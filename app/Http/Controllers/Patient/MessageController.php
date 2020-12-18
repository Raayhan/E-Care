<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MessageController extends Controller
{
    public function ViewMessages(){

        $name = Auth::guard('patient')->user()->name;
      

        $messages = DB::table('conversations')->where('receiver',$name)->get();
        return view('patient.messages',['messages'=>$messages]);
    }

}
