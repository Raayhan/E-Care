<?php

namespace App\Http\Controllers\Admin\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Branch;

use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function ShowRequest(){
        $shipments = DB::table('shipments')->select('id','parcel_id','sender_name','sender_phone','sender_address','recipient_name','recipient_phone','recipient_address','zone','created_at','type','delivery','details','status','amount')->where('status', '=','Requested,Pending Approval')->get();
        $branches = Branch::all(['name']);
        
        return view('admin.shipment.request',['shipments'=>$shipments,'branches'=>$branches]); 
    }


    public function RequestHandel(Request $request){

        if ($request->has('approve')) {
            $this->validator($request);
            $id = $request->input('id');
            $branch = $request->input('branch');
            $shipment = Shipment::findOrFail($id);

            $shipment->status = 'Approved';
            $shipment->branch = $branch;
            $shipment->save();
            return redirect()->to('/admin/shipment/request')->with('status','Request has been approved');


        }
        
        if ($request->has('decline')) {
            
            $id = $request->input('id');
            $shipment = Shipment::findOrFail($id);

            $shipment->status = 'Declined';
            $shipment->save();
            return redirect()->to('/admin/shipment/request')->with('error','Request has been declined');

        }


    }
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'branch'      => 'required',
               
            ];

            //custom validation error messages.
            $messages = [
                'branch.required'=>'Please assign a Branch'
               
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

   
}
