<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
   public function index(){

    $medicines = DB::table('orders')->where('status','REQUESTED')->get();

    return view('admin.medicines',['medicines'=>$medicines]);

   }
}
