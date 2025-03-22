<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employeesalary;
class EmployeeSalaryController extends Controller
{
    public function salaryview(){

        $data = Employee::all();
        return view('backend.employee.salary.salaryview',compact('data'));
    }

    public function salaryincrement($id){

        $data = Employee::find($id);
        return view('backend.employee.salary.salaryincrement',compact('data'));
    }

    public function salarystore( Request $request, $id){

        $data = Employee::find($id);

        $validated = $request->validate([
            'increment_salary' => 'required',
            'effected_salary' => 'required',
        ],[
            'increment_salary.required' => 'Please enter salary amount',
            'effected_salary.required' => 'Please select the date',
        ]);

        $previous_salary = $data->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $data->salary = $present_salary;
        $data->save();

        $employee = new Employeesalary;
        $employee->emp_id = $data->id;
        $employee->increment_salary = $request->increment_salary;
        $employee->present_salary = $present_salary;
        $employee->effected_salary = date('Y-m-d',strtotime($request->effected_salary)) ;
        $employee->previous_salary = $previous_salary;
        $employee->save();

        $notification = [
            'message' => 'Employee Salary Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('employee/salary/view')->with($notification);
    }

    public function salarydetails($id){

        $emp = Employee::find($id);
        $salary = Employeesalary::where('emp_id',$emp->id)->get();
        return view('backend.employee.salary.salarydetails',compact(['emp','salary']));
    }

    public function salarydelete($id){

        $emp = Employee::find($id)->delete();
        
        $notification = [
            'message' => 'Employee Salary Deleted Successfully',
            'alert-type' => 'danger',
        ];
        return redirect('employee/salary/view')->with($notification);
    }
}
