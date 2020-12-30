<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index() // Displays Departments page
    {
        $departments = DB::table('departments')->select('id','name','created_at')->get(); // select tables from database

        return view('admin.departments',['departments'=>$departments]); // Pass the table data as array
    }

    
    
    public function ControlDepartment(Request $request){ // Department Add/Remove function

        if ($request->has('Add')) { // New Department Add
           
            $this->validator($request); // Validate the new department informations

            $department = new Department; // Create new Department Object
            
            $department->name      = $request->input('name'); // Inserting data
            
            $department->save(); // Saving to the database
    
            return redirect()->to('/admin/departments')->with('status','New department added');
            //Redirecting to the department page with session message
        }
        
        if ($request->has('Remove')) {  // Existing department remove
            
            
        $id = $request->input('id'); // Getting department id

        $department = Department::findOrFail($id); // Check if the id available

        DB::table('departments')->where('id', '=', $id)->delete(); // deleting the table

        return redirect()->to('/admin/departments')->with('error','Department Removed');
            // Redirecting to the department page with session message
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
