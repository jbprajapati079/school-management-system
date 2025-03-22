<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
class EmployeeMonthlySalaryController extends Controller
{
    function monthly_salary_view()
    {
        try {

            return View('backend.employee.monthly_salary.monthly_salary_view');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function getsalary(Request $request)
    {
        try {
            
             $date = date("Y-m", strtotime($request->date));

            if ($date != '') {
                $where[] = ['date', 'like', $date . '%'];
            }
            
            $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['employee'])->where($where)->get();
            // dd($data);
            $html['thsource']  = '<th>SL</th>';
            $html['thsource'] .= '<th>ID No</th>';
            $html['thsource'] .= '<th>Employee Name</th>';
            $html['thsource'] .= '<th>Basic Salary</th>';
            $html['thsource'] .= '<th>Monthly Salary</th>';
            $html['thsource'] .= '<th>Action</th>';


            foreach ($data as $key => $attend) {
                $total_attendance = EmployeeAttendance::with('employee')->where($where)->where('employee_id', $attend->employee_id)->get();
                // dump($total_attendance);

                $absent = count($total_attendance->where('attendance_status','Absent'));

                // dump('absent=====>'.$absent);
                
                $color = 'success';
                $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
                $html[$key]['tdsource'] .= '<td>' . $attend['employee']['id_no'] . '</td>';
                $html[$key]['tdsource'] .= '<td>' . $attend['employee']['name'] . '</td>';
                $html[$key]['tdsource'] .= '<td>' . $attend['employee']['salary'] . '</td>';

                $salary = (float)$attend['employee']['salary'];
                // dump('salary=====>'.$salary);
                $perdaysalary = (float)$salary/30;
                // dump('perdaysalary=====>'.$perdaysalary);

                $totalsalaryminus = (float)$absent*(float)$perdaysalary;
                // dump('totalsalaryminus=====>'.$totalsalaryminus);

                $totalsalary = (float)$salary - (float)$totalsalaryminus;
                // dd('totalsalary=====>'.$totalsalary);


                $html[$key]['tdsource'] .= '<td>' . $totalsalary . '₹' . '</td>';
                $html[$key]['tdsource'] .= '<td>';
                $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PaySlip" target="_blanks" href="' . route("employee.monthly.salary.details",$attend->employee_id).'">Fee Slip</a>';
                $html[$key]['tdsource'] .= '</td>';
            }
            return response()->json(@$html);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function monthly_salary_details(Request $request, $employee_id)
    {

        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();

        $date = date("Y-m", strtotime($id->date));

        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data = EmployeeAttendance::where('employee_id', $id->employee_id)->with('employee')->where($where)->get();
        return view('backend.employee.monthly_salary.monthly_salary_details', compact('data'));
    }
}
