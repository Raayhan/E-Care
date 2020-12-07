<?php

namespace App\Http\Controllers\Customer\Parcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    
    public function ViewRequestForm()
    {   
        
        return view('customer.parcel.request');
    }

    public function ViewConfirmation(Request $request){
        
        $this->validator($request);

        $sender_name    = $request->input('sender_name');
        $sender_phone   = $request->input('sender_phone');
        $sender_address = $request->input('sender_address');

        $recipient_name    = $request->input('recipient_name');
        $recipient_phone   = $request->input('recipient_phone');
        $recipient_address = $request->input('recipient_address');
        $notes             = $request->input('notes');


        $zone     = $request->input('zone');
        $delivery = $request->input('delivery');
        $type     = $request->input('type');
        $details  = $request->input('details');

        $amount = "";
        $type_value = "";

        if($type == "Small"){
            $type_value = 20.00;

        }
        elseif($type == "Medium"){
            $type_value = 40.00;
        }
        else{
            $type_value = 80.00;
        }

        $delivery_value = "";

        if($delivery == "Regular"){
            $delivery_value = 30.00;

        }
        elseif($delivery == "Express"){
            $delivery_value = 60.00;
        }
        else{
            $delivery_value = 120.00;
        }


        $amount = $type_value + $delivery_value;

        $parcel_id =1102020100+Shipment::count();
        return view('customer.parcel.confirm',['sender_name'=>$sender_name,
                                               'sender_phone'=>$sender_phone,
                                               'sender_address'=>$sender_address,
                                               'recipient_name'=>$recipient_name,
                                               'recipient_phone'=>$recipient_phone,
                                               'recipient_address'=>$recipient_address,
                                               'notes'=>$notes,
                                               'zone'=>$zone,
                                               'delivery'=>$delivery,
                                               'type'=>$type,
                                               'details'=>$details,
                                               'amount'=>$amount,
                                               'parcel_id'=>$parcel_id]);




    }

    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'details'            => 'required|string|min:10|max:191',
                'sender_address'     => 'required|string|min:15|max:191',
                'recipient_name'     => 'required|string|min:5|max:255',
                'recipient_address'  => 'required|string|min:15|max:255',
                'recipient_phone'    => 'required|string|min:11|max:11',
            ];

            //custom validation error messages.
            $messages = [
                
                
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

    public function MakePayment(Request $request){

        $sender_name    = $request->input('sender_name');
        $sender_phone   = $request->input('sender_phone');
        $sender_address = $request->input('sender_address');

        $recipient_name    = $request->input('recipient_name');
        $recipient_phone   = $request->input('recipient_phone');
        $recipient_address = $request->input('recipient_address');
        $notes             = $request->input('notes');


        $zone     = $request->input('zone');
        $delivery = $request->input('delivery');
        $type     = $request->input('type');
        $details  = $request->input('details');
        $amount = $request->input('amount');
        $parcel_id = $request->input('parcel_id');

        return view('customer.parcel.payment',['sender_name'=>$sender_name,
                                               'sender_phone'=>$sender_phone,
                                               'sender_address'=>$sender_address,
                                               'recipient_name'=>$recipient_name,
                                               'recipient_phone'=>$recipient_phone,
                                               'recipient_address'=>$recipient_address,
                                               'notes'=>$notes,
                                               'zone'=>$zone,
                                               'delivery'=>$delivery,
                                               'type'=>$type,
                                               'details'=>$details,
                                               'amount'=>$amount,
                                               'parcel_id'=>$parcel_id]);




    }


    public function MakeRequest(Request $request){


        if ($request->has('paid')) {

        $this->PaymentValidator($request);
        $shipment = new Shipment;

        $shipment->sender_name    = $request->input('sender_name');
        $shipment->sender_phone   = $request->input('sender_phone');
        $shipment->sender_address = $request->input('sender_address');

        $shipment->recipient_name    = $request->input('recipient_name');
        $shipment->recipient_phone   = $request->input('recipient_phone');
        $shipment->recipient_address = $request->input('recipient_address');
        $shipment->notes             = $request->input('notes');


        $shipment->parcel_id = $request->input('parcel_id');
        $shipment->zone      = $request->input('zone');
        $shipment->delivery  = $request->input('delivery');
        $shipment->type      = $request->input('type');
        $shipment->details   = $request->input('details');
        $shipment->status    = $request->input('status');
        $shipment->amount    = $request->input('amount');

       $shipment->save();

       $order = new Order;
       $order->parcel_id = $request->input('parcel_id');
       $order->sender_name = $request->input('sender_name');
       $order->sender_phone   = $request->input('sender_phone');
       $order->delivery  = $request->input('delivery');
       $order->type      = $request->input('type');
       $order->payment_status = $request->input('payment_status');
       $order->bkash_number = $request->input('bkash_number');
       $order->trxid = $request->input('trxid');
       $order->amount = $request->input('amount');
       $order->save();

       $id= $request->input('id');
       $balance = $request->input('balance');
       $customer_shipment = $request->input('customer_shipment');
       $customer = Customer::findOrFail($id);
       $customer->balance= ($request->input('amount')+ $balance);
       $customer->shipments = $customer_shipment+1;
       $customer->save();


       return redirect()->to('/customer/parcel/all')->with('status','Request has been sent');
        }
        if ($request->has('unpaid')) {
            $shipment = new Shipment;

            $shipment->sender_name    = $request->input('sender_name');
            $shipment->sender_phone   = $request->input('sender_phone');
            $shipment->sender_address = $request->input('sender_address');
    
            $shipment->recipient_name    = $request->input('recipient_name');
            $shipment->recipient_phone   = $request->input('recipient_phone');
            $shipment->recipient_address = $request->input('recipient_address');
            $shipment->notes             = $request->input('notes');
    
    
            $shipment->parcel_id = $request->input('parcel_id');
            $shipment->zone      = $request->input('zone');
            $shipment->delivery  = $request->input('delivery');
            $shipment->type      = $request->input('type');
            $shipment->details   = $request->input('details');
            $shipment->status    = $request->input('status');
            $shipment->amount    = $request->input('amount');
    
           $shipment->save();
    
           $order = new Order;
           $order->parcel_id = $request->input('parcel_id');
           $order->sender_name = $request->input('sender_name');
           $order->sender_phone   = $request->input('sender_phone');
           $order->delivery  = $request->input('delivery');
           $order->type      = $request->input('type');
           $order->payment_status = $request->input('payment_status');
           $order->bkash_number = $request->input('bkash_number');
           $order->trxid = $request->input('trxid');
           $order->amount = $request->input('amount');
           $order->save();
    
           $id= $request->input('id');
           $due = $request->input('due');
           $customer_shipment = $request->input('customer_shipment');
           $customer = Customer::findOrFail($id);
           $customer->shipments = $customer_shipment+1;
           $customer->due= ($request->input('amount')+ $due);
           $customer->save();
    
    
           return redirect()->to('/customer/parcel/all')->with('status','Request has been sent');


        }





    }
    private function PaymentValidator(Request $request)
    {
            //validation rules.
            $rules = [
                'bkash_number'       => 'required|numeric',
                'trxid'              => 'required|string|unique:orders|min:15|max:18',
                
            ];

            //custom validation error messages.
            $messages = [
                'trxid.unique' =>'TrxID is not valid'
                
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

    public function DeleteRequest(Request $request){

        $shipment_id = $request->input('shipment_id');
        $order_id = $request->input('order_id');
        $shipment = Shipment::findOrFail($shipment_id);
        DB::table('shipments')->where('id', '=', $shipment_id)->delete();
        $order = Order::findOrFail($order_id);
        DB::table('orders')->where('id', '=', $order_id)->delete();
        return redirect()->to('/customer/parcel/all')->with('error','Parcel Deleted');

    }

}
