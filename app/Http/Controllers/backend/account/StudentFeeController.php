<?php

namespace App\Http\Controllers\backend\account;

use App\Models\User;
use App\Models\FeeAmount;

use App\Models\FeeCategory;
use App\Models\StudentYear;
use App\Models\StudentSetup;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AccountStudentFee;
use App\Http\Controllers\Controller;

class StudentFeeController extends Controller
{

    function student_fee_view()
    {

        $data = AccountStudentFee::all();

        return view('backend.account.student.student_fee_view', compact('data'));
    }

    function student_fee_add()
    {

        $StudentYear = StudentYear::all();
        $StudentSetup = StudentSetup::all();
        $FeeCategory = FeeCategory::all();

        return view('backend.account.student.student_fee_add', compact(['StudentYear'], ['StudentSetup'], ['FeeCategory']));
    }

    function student_fee_getstudent(Request $request)
    {

        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $fee_category_id = $request->fee_category_id;

        $data = AssignStudent::with(['dicount'])->where('student_year_id', $year_id)->where('student_class_id', $class_id)->get();
        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';

        foreach ($data as $key => $std) {

          
            $registrationfee = FeeAmount::where('fee_category_id', $fee_category_id)->where('class_id', $std->student_class_id)->first();

            $accountstudentfees = AccountStudentFee::where('student_id', $std->student_id)->where('year_id', $std->student_year_id)->where('class_id', $std->student_class_id)->where('fee_category_id', $fee_category_id)->where('date', $request->date)->first();

            if ($accountstudentfees != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . $std['student']['id_no'] . '<input type="hidden" name="fee_category_id" value= " ' . $fee_category_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $std['student']['name'] . '<input type="hidden" name="year_id" value= " ' . $std->student_year_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $std['student']['fathername'] . '<input type="hidden" name="class_id" value= " ' . $std->student_class_id . ' " >' . '</td>';

            $html[$key]['tdsource']  .= '<td>' . $registrationfee->amount . '$' . '<input type="hidden" name="date" value= " ' . $request->date . ' " >' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . $std['dicount']['discount'] . '%' . '</td>';

            $orginalfee = $registrationfee->amount;
            $discount = $std['dicount']['discount'];
            $discountablefee = $discount / 100 * $orginalfee;
            $finalfee = (int)$orginalfee - (int)$discountablefee;

            $html[$key]['tdsource'] .= '<td>' . '<input type="text" name="amount[]" value="' . $finalfee . ' " class="form-control" readonly' . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="hidden" name="student_id[]" value="' . $std->student_id . '">' . '<input type="checkbox" name="checkmanage[]" id="id{{$key}}" value="' . $key . '" ' . $checked . ' style="transform: scale(1.5);margin-left: 10px;"> <label for="id{{$key}}"> </label> ' . '</td>';
        }
        return response()->json(@$html);
    }

    function student_fee_store(Request $request)
    {


        $checkdata = $request->checkmanage;

        if ($checkdata !=null) {
           
            for ($i=0; $i <count($checkdata); $i++) { 
                
                $data = new AccountStudentFee();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->fee_category_id = $request->fee_category_id;
                $data->date = $request->date;
                $data->amount = $request->amount[$checkdata[$i]];
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->save();
            }
        }

        if (!empty(@$data) || empty($checkdata)) {
           
            $notification = [
                'message' => 'Student Fee Inserted  Successfully',
                'alert-type' => 'success',
            ];
            return redirect('account/student/fee/view')->with($notification);
        }
        
    }
}
