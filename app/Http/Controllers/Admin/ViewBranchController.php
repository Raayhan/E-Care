<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewBranchController extends Controller
{
    public function index()
    {
        $branches = DB::table('branches')->select('name','branch_id','zone','email','phone','completed','pending','balance')->get();

        return view('admin.branch.branches',['branches'=>$branches]);
    }
}
