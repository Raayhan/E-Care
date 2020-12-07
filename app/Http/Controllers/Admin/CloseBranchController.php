<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class CloseBranchController extends Controller
{
    public function ViewBranchList()
    {
        $branches = DB::table('branches')->select('name','id','branch_id','zone','completed','pending','balance')->get();

        return view('admin.branch.close',['branches'=>$branches]);
    }

    public function CloseBranch(Request $request){

        $id = $request->input('id');

        $branch = Branch::findOrFail($id);
        DB::table('branches')->where('id', '=', $id)->delete();
        return redirect()->to('/admin/branch/close')->with('status','Branch Closed');
    }
}
