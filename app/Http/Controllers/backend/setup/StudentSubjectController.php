<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubject;

class StudentSubjectController extends Controller
{
    public function studentsubjectview(){

        $data = StudentSubject::latest()->get();
        return view('backend.user.studentsubject.studentsubjectview',compact('data'));
    }

    public function studentsubjectadd(){
        return view('backend.user.studentsubject.studentsubjectadd');
    }

    public function studentsubjectstore(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_subjects,name',
        ],[
            'name.required' => 'Subject name field is required',
        ]);
        
        $data = new StudentSubject;
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => ' Subject Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/subject/view')->with($notification);
    }

    public function studentsubjectedit($id){

        $data = StudentSubject::find($id);
        return view('backend.user.studentsubject.studentsubjectedit',compact('data'));
    }

    public function studentsubjectupdate(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:student_subjects,name',
        ],[
            'name.required' => 'Subject name field is required',
        ]);
        
        $data = StudentSubject::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => ' Subject Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/subject/view')->with($notification);
    }

    public function studentsubjectdelete($id){

        $data = StudentSubject::find($id)->delete();

        $notification = [
            'message' => ' Subject Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/subject/view')->with($notification);
    }
}


