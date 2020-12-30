<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
   public function index(){ // Displays medicines page function

    $medicines = DB::table('orders')->where('status','REQUESTED')->get();//Selects all the requested orders from table

    return view('admin.medicines',['medicines'=>$medicines]);//returns the data as array to the view

   }
}
