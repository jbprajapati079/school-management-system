<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function examtypeview(){

        $data = ExamType::latest()->get();
        return view('backend.user.examtype.viewexamtype',compact('data'));
    }

    public function addexamtype(){
        return view('backend.user.examtype.addexamtype');
    }

    public function storeexamtype(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ],[
            'name.required' => 'Examtype field is required'
        ]);

        $data = new ExamType;
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/exam/type/view')->with($notification);
    }

    public function editexamtype($id){

        $data = ExamType::find($id);
        return view('backend.user.examtype.editexamtype',compact('data'));
    }

    public function updateexamtype(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ],[
            'name.required' => 'Examtype field is required'
        ]);

        $data = ExamType::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Exam Type Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/exam/type/view')->with($notification);
    }

    public function deleteexamtype($id){

        $data = ExamType::find($id)->delete();
        $notification = [
            'message' => 'Exam Type Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/exam/type/view')->with($notification);
    }
    
}   
