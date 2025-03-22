<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSetup;

class StudentClasssController extends Controller
{
    public function studentclassview(){

        $data = StudentSetup::all();
        return view('backend.user.student_setup.viewstudent',compact('data'));
    }

    public function addstudentclass(){
        return view('backend.user.student_setup.addstudentclass');
    }

    public function storestudentclass(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Class field is required'
        ]
        );
        $student = new StudentSetup;
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/class/view')->with($notification);
    }

    public function editstudentclass($id){

        $editstudentdata = StudentSetup::find($id);
        return view('backend.user.student_setup.edittudent',compact('editstudentdata'));
    }

    public function updatestudentclass(Request $request ,$id){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Class field is required'
        ]
        );
        
        $student = StudentSetup::find($id);
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/class/view')->with($notification);
    }

    public function deletestudentclass($id){

        $deletestudentdata = StudentSetup::find($id)->delete();
        $notification = [
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/class/view')->with($notification,$deletestudentdata);
    }
}
