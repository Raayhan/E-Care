<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Auth;

class MedicineController extends Controller
{
    public function AllMedicines(){

        $patient_id = Auth::guard('patient')->user()->id;
       
      
       
           $medicines = DB::table('medicines')->where('patient_id', '=',$patient_id)->get();
       
          
        
        return view('patient.medicines.all',['medicines'=>$medicines]);
       

    }


    public function CreateOrder(Request $request){

        $patient_id = Auth::guard('patient')->user()->id;
        $patient_name = Auth::guard('patient')->user()->name;
        $patient_address = Auth::guard('patient')->user()->address;

        $order = new Order;
        $order->name         = $request->input('name');
        $order->type         = $request->input('type');
        $order->dosage       = $request->input('dosage');
        $order->patient_id   = $patient_id;
        $order->patient_name = $patient_name;
        $order->patient_address = $patient_address;
        $order->status       = 'PENDING';

        $order->save();

        $orders = DB::table('orders')->where('patient_id', '=',$patient_id)->where('status','PENDING')->get();

        return view('patient.medicines.orders',['orders'=>$orders]);


    }

    public function Checkout(Request $request){
        
        $patient_id = $request->input('patient_id');
        $status = 'REQUESTED';
        Order::where('patient_id',$patient_id)->update(['status' => $status]);
       
        return view('patient.medicines.checkout');

    }


    


}
