<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentAttendance;
use App\Models\StudentGroup;
use App\Models\StudentSetup;
use App\Models\StudentYear;
use App\Models\User;

class StudentAttendanceController extends Controller
{
    function attendance_view(){
       
        $StudentSetup = StudentSetup::all();
        $StudentYear = StudentYear::all();
        $StudentGroup = StudentGroup::all();
        return view('backend.student.student_attendance.attendance_view',compact(['StudentSetup','StudentYear','StudentGroup']));
    }

    function attendance_get_attendance(Request $request){

        $alldata = StudentAttendance::where('student_class_id', $request->student_class_id)->where('student_group_id', $request->student_group_id)->where('student_year_id', $request->student_year_id)->with('student')->get();
        // dd($alldata);
        return response()->json( $alldata );
    }
}
