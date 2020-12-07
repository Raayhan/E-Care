<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;

class DashboardController extends Controller
{
   


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $branch = Branch::count();
        // $customer = Customer::count();
        // $completed = Branch::sum('completed');
        // $pending = Shipment::where('status', 'Requested,Pending Approval')->count();
        // return view('admin.dashboard',['branch'=>$branch,'customer'=>$customer,'completed'=>$completed,'pending'=>$pending]);
        return view('admin.dashboard');
    }
}
