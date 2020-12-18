<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PrescriptionController extends Controller
{
    public function CreatePrescription(){
     
        
        return view('doctor.prescription');
    }
}
