<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function Index(){
        $employees = Employee::with('company')->simplepaginate(4);
        $companies = Company::all();
        return view('Form.Employees_Insert_Form', compact('employees', 'companies'));
        // return view('Form.Employees_Insert_Form');

    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Create a new employee
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('status','data is Successfully Inserted');
    }
    public function Delete_Data($id){
        $emp=Employee::find($id);
        $emp->delete();
        return redirect()->back()->with('status','Data Delete Successfully');
      }
      public function Edit($id){
        $employee=Employee::find($id);
        $companies = Company::all();
        return view('Form.Emp_Update', compact('employee', 'companies'));
      }

      public function Update(Request $request, $id)
      {
          $employee = Employee::findOrFail($id);
      
          // Validate and update logic
          $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
          ]);
      
          $employee->first_name = $request->input('first_name');
          $employee->last_name = $request->input('last_name');
          $employee->company_id = $request->input('company_id');
          $employee->email = $request->input('email');
          $employee->phone = $request->input('phone');
          $employee->save();
      
          // Redirect back to the previous page with a success message
          return redirect()->route('View_Form')->with('status', 'Data is successfully updated!');


      }
        
}
