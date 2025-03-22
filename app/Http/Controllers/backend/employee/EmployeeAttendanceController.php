<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\EmployeeAttendance;
use App\models\Employee;

class EmployeeAttendanceController extends Controller
{
    function attendance_view()
    {
        try {
            $data = EmployeeAttendance::select('date')->groupBy('date')->get();

            return view('backend.employee.attendance.attendance_view', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function attendance_add()
    {
        try {
            $emp = Employee::all();
            return view('backend.employee.attendance.attendance_add', compact('emp'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function attendance_store(Request $request)
    {
        try {
            $employee_counter = count($request->employee_id);

            for ($i = 0; $i < $employee_counter; $i++) {
                $attendance_status = 'attendance_status' . $i;
                $attendance = new EmployeeAttendance();
                $attendance->employee_id = $request->employee_id[$i];
                $attendance->date = $request->date;
                $attendance->attendance_status = $request->$attendance_status;
                $attendance->save();
            }

            $notification = [
                'message' => 'Employee Attendance Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('employee/attendance/view')->with($notification);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function attendance_edit($date)
    {
        try {
            $data = EmployeeAttendance::where('date', $date)->get();

            return view('backend.employee.attendance.attendance_edit',compact('data'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function attendance_update(Request $request,$date)
    {
        try {
            $empl = EmployeeAttendance::where('date', $date)->delete();
            $employee_counter = count($request->employee_id);

            for ($i = 0; $i < $employee_counter; $i++) {
                $attendance_status = 'attendance_status' . $i;
                $attendance = new EmployeeAttendance();
                $attendance->employee_id = $request->employee_id[$i];
                $attendance->date = $request->date;
                $attendance->attendance_status = $request->$attendance_status;
                $attendance->save();
            }

            $notification = [
                'message' => 'Employee Attendance Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect('employee/attendance/view')->with($notification);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function attendance_detail($date)
    {
        try {
            $data = EmployeeAttendance::where('date', $date)->get();

            return view('backend.employee.attendance.attendance_detail',compact('data'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

