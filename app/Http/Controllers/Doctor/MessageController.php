<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MessageController extends Controller
{
    public function ViewMessages(){

       $name = Auth::guard('doctor')->user()->name;
       $title = 'Dr. ';
       $fullName = $title.$name;


        $messages = DB::table('conversations')->where('receiver',$fullName)->get();
  
        
        
        return view('doctor.messages',['messages'=>$messages]);
    }


}
