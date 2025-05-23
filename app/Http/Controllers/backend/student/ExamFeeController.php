<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use App\Models\StudentSetup;
use App\Models\StudentShift;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\User;
use App\Models\ExamType;

class ExamFeeController extends Controller
{
    public function examfeeview()
    {
        $StudentYear = StudentYear::all();
        $StudentSetup = StudentSetup::all();
        $ExamType = ExamType::all();
        return view('backend.student.examfee.examfeeview', compact(['StudentYear', 'StudentSetup', 'ExamType']));
    }

    public function getstudents(Request $request)
    {
        $year_id = $request->student_year_id;
        $class_id = $request->student_class_id;
        $month = $request->month;
        if ($year_id != '') {
            $where[] = ['student_year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['student_class_id', 'like', $class_id . '%'];
        }
        $allStudent = AssignStudent::with(['dicount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Exam Type Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_category_id', '1')->where('class_id', $v->student_class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->role . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registrationfee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['dicount']['discount'] . '%' . '</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['dicount']['discount'];
            $discounttablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discounttablefee;

            $html[$key]['tdsource'] .= '<td>' . $finalfee . '₹' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PaySlip" target="_blanks" href="' . route("student.exam.fee.details") . '?class_id=' . $v->student_class_id . '&student_id=' . $v->student_id . '&exam_type_id=' . $request->exam_type_id . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function feedetails(Request $request)
    {

        $ExamType = ExamType::where('id', $request->exam_type_id)->first()['name'];
        $student_id = $request->student_id;
        $StudentSetup = $request->student_class_id;

        $data = AssignStudent::with(['student', 'dicount', 'student_group', 'student_class', 'student_year', 'student_shift'])->where('student_id', $student_id)->first();

        // dd($data->toArray());
        return view('backend.student.examfee.details_pdf', compact(['data', 'ExamType']));
    }
}
