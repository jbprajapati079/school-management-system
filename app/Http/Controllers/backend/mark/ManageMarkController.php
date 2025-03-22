<?php

namespace App\Http\Controllers\backend\mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignSubject;
use App\Models\StudentSetup;
use App\Models\StudentYear;
use App\Models\User;
use App\Models\ExamType;
use App\Models\ManageMark;
use App\Models\AssignStudent;

class ManageMarkController extends Controller
{
    function mark_add()
    {
        try {
            $StudentYear = StudentYear::all();
            $StudentSetup = StudentSetup::all();
            $subjects = AssignSubject::all();
            $exam_type = ExamType::all();

            return view('backend.mark.mark_add', compact(['StudentYear', 'StudentSetup', 'exam_type', 'subjects']));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function mark_getsubject(Request $request)
    {
        try {


            $class_id = $request->student_class_id;


            $data = AssignSubject::with(['subject'])->where('class_id', $class_id)->get();

            return response()->json($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function mark_getstudents(Request $request)
    {
        try {

            $year_id = $request->student_year_id;
            $class_id = $request->student_class_id;


            $data = AssignStudent::with(['student'])->where('student_year_id', $year_id)->where('student_class_id', $class_id)->get();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function mark_store(Request $request)
    {
        try {

            $student_count = count($request->student_id);

            for ($i = 0; $i < $student_count; $i++) {

                $data = new ManageMark();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->student_class_id;
                $data->year_id = $request->student_year_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->mark = $request->mark[$i];

                $data->save();
            }

            $notification = [
                'message' => 'Subject Mark Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    function mark_edit()
    {

        try {

            $StudentYear = StudentYear::all();
            $StudentSetup = StudentSetup::all();
            $exam_type = ExamType::all();

            return view('backend.mark.mark_edit', compact(['StudentYear', 'StudentSetup', 'exam_type']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function geteditmark(Request $request)
    {

        try {

            $year_id = $request->student_year_id;
            $class_id = $request->student_class_id;
            $exam_type_id =$request->exam_type_id;
            $assign_subject_id =$request->assign_subject_id;

            $data = ManageMark::with(['student'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('assign_subject_id', $assign_subject_id)->get();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function updateMark(Request $request)
    {
        try {

            $delete = ManageMark::where('year_id', $request->student_year_id)->where('class_id', $request->student_class_id)->where('exam_type_id', $request->exam_type_id)->where('assign_subject_id', $request->assign_subject_id)->delete();
            
            $student_count = count($request->student_id);

            for ($i = 0; $i < $student_count; $i++) {

                $data = new ManageMark();
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->class_id = $request->student_class_id;
                $data->year_id = $request->student_year_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->mark = $request->mark[$i];
                $data->save();
            }

            $notification = [
                'message' => 'Subject Mark Updated Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
