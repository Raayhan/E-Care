<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')->select('id','name','created_at')->get();

        return view('admin.departments',['departments'=>$departments]);
    }

    public function ControlDepartment(Request $request){

        if ($request->has('Add')) {
           
            $this->validator($request);

            $department = new Department;
            $department->name      = $request->input('name');
            $department->save();
    
            return redirect()->to('/admin/departments')->with('status','New department added');
        }
        
        if ($request->has('Remove')) {
            
            
        $id = $request->input('id');

        $department = Department::findOrFail($id);
        DB::table('departments')->where('id', '=', $id)->delete();
        return redirect()->to('/admin/departments')->with('error','Department Removed');
        }

        
       

    }

    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'name'      => 'required|unique:departments|string|min:3|max:15',

            ];

            //custom validation error messages.
            $messages = [
                
                'name.unique' => 'Department already exists',

 
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }
}
