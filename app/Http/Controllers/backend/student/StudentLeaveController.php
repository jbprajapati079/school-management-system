<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentLeave;
use App\Models\StudentLeavePurpose;
use App\Models\StudentGroup;
use App\Models\StudentSetup;
use App\Models\StudentYear;

class StudentLeaveController extends Controller
{
    function leaveview()
    {
        try {

            $student_leave = StudentLeave::all();

            return view('backend.student.student_leave.student_leaveview', compact('student_leave'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function studentleaveadd()
    {
        try {
            $user = User::where('usertype', 'Student')->get();
            $group = StudentGroup::all();
            $class = StudentSetup::all();
            $year = StudentYear::all();
            return view('backend.student.student_leave.studentleaveadd', compact(['user', 'group', 'class', 'year']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function studentleavestore(Request $request)
    {

        try {
            $student_leave_purpose = new StudentLeavePurpose();
            $student_leave_purpose->name = $request->student_leave_id;
            $student_leave_purpose->save();

            $data = new StudentLeave();
            $data->student_id = $request->student_id;
            $data->student_leave_id = $student_leave_purpose->id;
            $data->student_class = $request->student_class;
            $data->student_group = $request->student_group;
            $data->student_year = $request->student_year;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;

            $data->save();
            $notification = [
                'message' => 'Student Leave Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('student/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function studentleaveedit($id)
    {
        try {
            $data = StudentLeave::find($id);
            $user = User::where('usertype', 'Student')->get();
            $class = StudentSetup::all();
            $year = StudentYear::all();
            $group = StudentGroup::all();

            return view('backend.student.student_leave.studentleaveedit', compact(['data', 'class', 'year', 'group', 'user']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function studentleaveupdate(Request $request, $id)
    {
        try {
            $student_leave_purpose = new StudentLeavePurpose();
            $student_leave_purpose->name = $request->student_leave_id;
            $student_leave_purpose->save();

            $data =  StudentLeave::find($id);
            $data->student_id = $request->student_id;
            $data->student_leave_id = $student_leave_purpose->id;
            $data->student_class = $request->student_class;
            $data->student_group = $request->student_group;
            $data->student_year = $request->student_year;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->save();
            $notification = [
                'message' => 'Student Leave Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect('student/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function studentleavedelete($id)
    {
        try {
            $data = StudentLeave::find($id)->delete();
            $notification = [
                'message' => 'Student Leave Deleted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('student/leave/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
