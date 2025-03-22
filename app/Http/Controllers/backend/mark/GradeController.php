<?php

namespace App\Http\Controllers\backend\mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentGrade;

class GradeController extends Controller
{
    function grade_view()
    {

        try {
            $data = StudentGrade::all();
            return view('backend.grade.grade_view', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function grade_add()
    {

        try {

            return view('backend.grade.grade_add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function grade_store(Request  $request)
    {

        try {

            $data = new StudentGrade();
            $data->grade_name = $request->grade_name;
            $data->grade_point = $request->grade_point;
            $data->start_mark = $request->start_mark;
            $data->end_mark = $request->end_mark;
            $data->start_point = $request->start_point;
            $data->end_point = $request->end_point;
            $data->remark = $request->remark;
            $data->save();

            $notification = [
                'message' => 'Student Grade Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('mark/grade/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function grade_edit($id)
    {

        try {

            $data = StudentGrade::find($id);
            return view('backend.grade.grade_edit',compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function grade_update(Request $request,$id)
    {

        try {

            $data = StudentGrade::find($id);
            $data->grade_name = $request->grade_name;
            $data->grade_point = $request->grade_point;
            $data->start_mark = $request->start_mark;
            $data->end_mark = $request->end_mark;
            $data->start_point = $request->start_point;
            $data->end_point = $request->end_point;
            $data->remark = $request->remark;
            $data->save();

            $notification = [
                'message' => 'Student Grade Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect('mark/grade/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
