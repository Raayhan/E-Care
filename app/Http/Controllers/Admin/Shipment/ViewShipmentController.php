<?php

namespace App\Http\Controllers\Admin\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ViewShipmentController extends Controller
{
    public function ShowPage(){
        $shipments = DB::table('shipments')->select('id','parcel_id','sender_name','recipient_name','recipient_phone','recipient_address','zone','notes','created_at','type','delivery','details','status','amount')->get();
        $orders = DB::table('orders')->select('id','payment_status')->get();
        return view('admin.shipment.all',['shipments'=>$shipments,'orders'=>$orders]);
    }
}
