<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createEmp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'emp_no' => 'required|min:6|unique:employees',
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'workdept' => 'required',
            'phone_no' => 'required|numeric',
        ], [
            'emp_no.required' => 'Employee number is required.',
            'emp_no.unique' => 'This employee number is already taken.',
            'name.required' => 'Employee name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'workdept.required' => 'Work department is required.',
            'phone_no.required' => 'Phone number is required.',
            'phone_no.numeric' => 'Phone number must be numeric.',
            'sex.required' => 'Please select gender.',
        ]);


        $employee = new Employee;
        $employee->emp_no = $request->input('emp_no');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->work_dept = $request->input('workdept');
        $employee->contact_no = $request->input('phone_no');
        $employee->Sex = $request->input('sex');
        $employee->save();
        return redirect('user/employee')->with('status','Employee Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showDetail()
    {
        $employee=Employee::all();
        return view('indexEmp',compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('editEmp', compact('employee'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'emp_no' => 'required|min:6|unique:employees',
            'name' => 'required',
            'email' => 'required|email|',
            'workdept' => 'required',
            'phone_no' => 'required|numeric|min:10',
        ], [
            'emp_no.required' => 'Employee number is required.',
            'emp_no.unique' => 'This employee number is already taken.',
            'name.required' => 'Employee name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'workdept.required' => 'Work department is required.',
            'phone_no.required' => 'Phone number is required.',
            'phone_no.numeric' => 'Phone number must be numeric.',
            'sex.required' => 'Please select gender.',
        ]);

        $employee = Employee::find($id);
        $employee->emp_no = $request->input('emp_no');
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->work_dept = $request->input('workdept');
        $employee->contact_no = $request->input('phone_no');
        $employee->Sex = $request->input('sex');
        $employee->update();
        return redirect()->back()->with('status','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        return redirect()->back()->with('status','Employee Deleted Successfully');
    }
}