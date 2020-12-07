<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class BlockCustomerController extends Controller
{
    public function ViewCustomerList()
    {
        $customers = DB::table('customers')->select('name','id','phone','shipments','balance','due')->get();
        return view('admin.customer.block',['customers'=>$customers]);
    }

    public function BlockCustomer(Request $request){

        $id = $request->input('id');

        $customer = Customer::findOrFail($id);
        DB::table('customers')->where('id', '=', $id)->delete();
        return redirect()->to('/admin/customer/block')->with('status','Customer Blocked');
    }
}
