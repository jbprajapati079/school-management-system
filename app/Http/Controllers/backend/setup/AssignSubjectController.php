<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\StudentSetup;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\StudentSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AssignSubjectController extends Controller
{
    public function assignsubjectview()
    {
        try {
            $data = AssignSubject::select('class_id', DB::raw("count(*) as total, class_id"))
                ->groupBy('class_id')->get();
            return view('backend.user.assignsubject.assignsubjectview', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function assignsubjectadd()
    {
        try {
            $StudentSubject = StudentSubject::all();
            $StudentSetup = StudentSetup::all();
            return view('backend.user.assignsubject.assignsubjectadd', compact(['StudentSubject', 'StudentSetup']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignsubjectstore(Request $request)
    {
        try {
            $subjectcount = count($request->subject_id);
            if ($subjectcount !== null) {

                for ($i = 0; $i < $subjectcount; $i++) {

                    $data = new AssignSubject;
                    $data->class_id = $request->class_id;
                    $data->subject_id = $request->subject_id[$i];
                    $data->full_mark = $request->full_mark[$i];
                    $data->pass_mark = $request->pass_mark[$i];
                    $data->subjective = $request->subjective[$i];
                    $data->save();
                }
            }

            $notification = [
                'message' => 'Assign Subject Inserted Successfully',
                'alert-type' => 'success',
            ];
            return redirect('setup/assign/subject/view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignsubjectedit($class_id)
    {
        try {
            $AssignSubject = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'ASC')->get();
            $StudentSubject = StudentSubject::all();
            $StudentSetup = StudentSetup::all();
            return view('backend.user.assignsubject.assignsubjectedit', compact(['AssignSubject', 'StudentSubject', 'StudentSetup']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignsubjectupdate(Request $request, $class_id)
    {
        try {
            if ($request->subject_id == null) {

                $notification = [
                    'message' => 'Sorry please select any subject',
                    'alert-type' => 'error'
                ];
                return redirect()->route('edit.assign.subject', $class_id)->with($notification);
            } else {
                $classcount = count($request->subject_id);

                AssignSubject::where('class_id', $class_id)->delete();

                for ($i = 0; $i < $classcount; $i++) {

                    $data = new AssignSubject;
                    $data->class_id = $request->class_id;
                    $data->subject_id = $request->subject_id[$i];
                    $data->full_mark = $request->full_mark[$i];
                    $data->pass_mark = $request->pass_mark[$i];
                    $data->subjective = $request->subjective[$i];
                    $data->save();
                }


                $notification = [
                    'message' => 'Data Updated Successfully',
                    'alert-type' => 'success',
                ];
                return redirect('setup/assign/subject/view')->with($notification);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignsubjectdetails($class_id)
    {
        try {
            $data = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'ASC')->get();
            $StudentSubject = StudentSubject::all();
            $StudentSetup = StudentSetup::all();
            return view('backend.user.assignsubject.assignsubjectdetails', compact('data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
