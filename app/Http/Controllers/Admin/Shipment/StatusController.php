<?php

namespace App\Http\Controllers\Admin\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class StatusController extends Controller
{
    public function ShowPage(){
        return view('admin.shipment.live');
    }

    public function ViewStatus(Request $request){
       
        $this->validator($request);
        $parcel_id = $request->input('parcel_id');

       
       
        $querry = Shipment::where('parcel_id', '=',$parcel_id)->select('id','parcel_id','sender_name','sender_phone','sender_address','recipient_name','recipient_phone','recipient_address','zone','created_at','type','delivery','details','status','amount')->first();
    
        if ($querry === null) {
            return redirect()->to('admin/shipment/live')->with('error','No record found with this ID');
        }
        else{
            $orders = DB::table('orders')->select('id','payment_status')->where('parcel_id', '=',$parcel_id)->get();
            $shipments = Shipment::where('parcel_id', '=',$parcel_id)->select('id','parcel_id','sender_name','sender_phone','sender_address','recipient_name','recipient_phone','recipient_address','zone','created_at','type','delivery','details','status','amount')->get(); 
        return view('admin.shipment.status',['shipments'=>$shipments,'orders'=>$orders]); 
        }
    }


    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'parcel_id'      =>'required|numeric|min:12',
               
            ];

            //custom validation error messages.
            $messages = [
                
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
}
