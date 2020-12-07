<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewCustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->select('name','id','email','phone','address','shipments','balance','due')->get();
        return view('admin.customer.customers',['customers'=>$customers]);
    }
}
