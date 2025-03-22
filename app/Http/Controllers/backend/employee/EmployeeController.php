<?php

namespace App\Http\Controllers\backend\employee;

use App\Models\Employee;
use App\Models\Designation;

use Illuminate\Http\Request;
use App\Models\Employeesalary;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function registrationview()
    {

        $data = Employee::all();
        return view('backend.employee.employeeregistration.registrationview', compact('data'));
    }

    public function registrationadd()
    {

        $data = Designation::all();
        return view('backend.employee.employeeregistration.registrationadd', compact('data'));
    }

    public function registrationstore(Request $request)
    {

        DB::transaction(function () use ($request) {
            $empid_no = date('Ym', strtotime($request->join_date));
            $firstreg = 0;
            $empid = $firstreg + 1;
            
            if ($empid < 10) {
                $id_no  = '000' . $empid;

            } elseif ($empid < 100) {
                $id_no  = '00' . $empid;
            } elseif ($empid < 1000) {
                $id_no  = '0' . $empid;
            }

            $final_id = $empid_no.$id_no;
            
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'mobile' => 'required',
                'designation_id' => 'required',
                'dob' => 'required',
                'join_date' => 'required',
                'salary' => 'required',
            ],[

                'name.required' => 'Please enter name',
                'email.required' => 'Please enter email',
                'gender.required' => 'Please enter gender',
                'mobile.required' => 'Please enter mobile',
                'designation_id.required' => 'Please enter designation',
                'dob.required' => 'Please enter date of birth',
                'join_date.required' => 'Please enter joining date',
                'salary.required' => 'Please enter salary',

            ]);


            $emp = new Employee();
            $code = rand(0000, 9999);
            $emp->id_no = $final_id;
            $emp->password = bcrypt($code);
            $emp->code = $code;
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->mobile = $request->mobile;
            $emp->gender = $request->gender;
            $emp->designation_id = $request->designation_id;
            $emp->salary = $request->salary;
            $emp->dob = date('Y-m-d', strtotime($request->dob));
            $emp->join_date = date('Y-m-d', strtotime($request->join_date));
            $emp->address  = $request->address;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'), $filename);
                $emp['image'] = $filename;
            }
            $emp->save();

            $employee = new Employeesalary;
            $employee->emp_id = $emp->id;
            $employee->previous_salary = $request->salary;
            $employee->present_salary = $request->salary;
            $employee->increment_salary = '0';
            $employee->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee->save();

            
        });

        $notification = [
            'message' => 'Employee Registration Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('employee/registration/view')->with($notification);
    }

    public function registrationedit($id)
    {

        $data = Designation::all();
        $emp = Employee::find($id);
        return view('backend.employee.employeeregistration.registrationedit', compact(['data','emp']));
    }

    public function registrationupdate(Request $request,$id)
    {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'mobile' => 'required',
                'designation_id' => 'required',
                'dob' => 'required',
                'join_date' => 'required',
                'salary' => 'required',
            ],[

                'name.required' => 'Please enter name',
                'email.required' => 'Please enter email',
                'gender.required' => 'Please enter gender',
                'mobile.required' => 'Please enter mobile',
                'designation_id.required' => 'Please enter designation',
                'dob.required' => 'Please enter date of birth',
                'join_date.required' => 'Please enter joining date',
                'salary.required' => 'Please enter salary',

            ]);


            $emp = Employee::find($id);
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->mobile = $request->mobile;
            $emp->gender = $request->gender;
            $emp->designation_id = $request->designation_id;
            $emp->salary = $request->salary;
            $emp->dob = date('Y-m-d', strtotime($request->dob));
            $emp->join_date = date('Y-m-d', strtotime($request->join_date));
            $emp->address  = $request->address;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image'.$emp->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'), $filename);
                $emp['image'] = $filename;
            }
            $emp->save();

        $notification = [
            'message' => 'Employee Registration Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('employee/registration/view')->with($notification);
    }

    public function registrationdelete($id)
    {

        $emp = Employee::find($id)->delete();
        $notification = [
            'message' => 'Employee Registration Deleted Successfully',
            'alert-type' => 'danger',
        ];
        return redirect('employee/registration/view')->with($notification);
    }

    public function registrationdetails($id)
    {
        $emp = Employee::find($id);
        return view('backend.employee.employeeregistration.registrationdetails', compact(['emp']));
    }
}
