<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeavePurpose;

class EmployeeLeaveController extends Controller
{
    function leaveview()
    {
        try {
            $employee_leave = EmployeeLeave::all();

            return view('backend.employee.employeeleave.employee_leave_view', compact('employee_leave'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_add()
    {
        try {
            $employee = Employee::all();
            return view('backend.employee.employeeleave.employee_leave_add', compact('employee'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_store(Request $request)
    {

        try {
            $emp_leave = new EmployeeLeavePurpose();
            $emp_leave->name = $request->leave_purpose_id;
            $emp_leave->save();

            $data = new EmployeeLeave();
            $data->employee_id = $request->employee_id;
            $data->leave_purpose_id = $emp_leave->id;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;

            $data->save();

            $notification = [
                'message' => 'Employee Leave Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('employee/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_edit($id)
    {

        try {
            $data = EmployeeLeave::find($id);
            $emp_leave = EmployeeLeavePurpose::where('id', $id)->get();
            $employee = Employee::all();

            return view('backend.employee.employeeleave.employee_leave_edit', compact(['data', 'emp_leave', 'employee']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_update(Request $request, $id)
    {

        try {
            $emp_leave = new EmployeeLeavePurpose();
            $emp_leave->name = $request->leave_purpose_id;
            $emp_leave->save();

            $data =  EmployeeLeave::find($id);
            $data->employee_id = $request->employee_id;
            $data->leave_purpose_id = $emp_leave->id;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->save();

            $notification = [
                'message' => 'Employee Leave Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect('employee/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function employee_leave_delete($id)
    {

        try {
            $data = EmployeeLeave::find($id)->delete();

            $notification = [
                'message' => 'Employee Leave Deleted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('employee/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
