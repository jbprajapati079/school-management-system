<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function studentshiftview(){

        $data = StudentShift::latest()->get();
        return view('backend.user.shift.viewshift',compact('data'));
    }

    public function addstudentshift(){
        return view('backend.user.shift.addstudentshift');
    }

    public function storestudentshift(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ],
        [
            'name.required' => 'Shift field is required'
        ]
        );

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/shift/view')->with($notification);
    }

    public function editstudentshift($id){

        $editstudentshiftdata = StudentShift::find($id);
        return view('backend.user.shift.editstudentshift',compact('editstudentshiftdata'));
    }

    public function updatestudentshift(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ],
        [
            'name.required' => 'Shift field is required'
        ]
        );

        $data = StudentShift::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/shift/view')->with($notification);
    }

    public function deletestudentshift($id){

        $studentdeleteshiftdata = StudentShift::find($id)->delete();
        $notification = [
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/shift/view')->with($notification,$studentdeleteshiftdata);
    }
}
