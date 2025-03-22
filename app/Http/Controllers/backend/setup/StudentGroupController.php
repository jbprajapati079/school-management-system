<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;
class StudentGroupController extends Controller
{
    public function studentgroupview(){

        $data = StudentGroup::all();
        return view('backend.user.group.viewgroup',compact('data'));
    }

    public function addstudentgroup(){
        return view('backend.user.group.addstudentgroup');
    }

    public function storestudentgroup(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Group field is required'
        ]
        );
        $student = new StudentGroup;
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/group/view')->with($notification);
    }

    public function editstudentgroup($id){

        $editstudentgroup = StudentGroup::find($id);
        return view('backend.user.group.editstudentgroup',compact('editstudentgroup'));
    }

    public function updatestudentgroup(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Group field is required'
        ]
        );
        $student = StudentGroup::find($id);
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/group/view')->with($notification);
    }

    public function deletestudentgroup($id){

        $deletestudentdata = StudentGroup::find($id)->delete();
        $notification = [
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/group/view')->with($notification,$deletestudentdata);
    }
}
