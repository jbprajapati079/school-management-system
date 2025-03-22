<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;
use App\Models\StudentSetup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\Role;
use App\Models\User;
use App\Models\AssignStudent;

class RolegenerateController extends Controller
{
    public function rolegenerateview()
    {

        $StudentYear = StudentYear::all();
        $StudentSetup = StudentSetup::all();

        return view('backend.student.role.rolegenerateview', compact(['StudentYear', 'StudentSetup']));
    }

    public function getstudents(Request $request)
    {

        $alldata = AssignStudent::where('student_class_id', $request->student_class_id)->where('student_year_id', $request->student_year_id)
        ->with('student')->get();

        return response()->json( $alldata );
    }

    public function storerollgenerate(Request $request)
    {
        $year_id = $request->student_year_id;
        $class_id = $request->student_class_id;

        if ($request->student_id !=null) {
            
            for ($i=0; $i <count($request->student_id) ; $i++) { 
                
                AssignStudent::where('student_year_id',$year_id)->where('student_class_id',$class_id)
                ->where('student_id',$request->student_id[$i])->update(['role' =>$request->role[$i]]);
            }
           

        }

        else{

            $notification = [
                'message' => 'Student Role Error',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }

        $notification = [
            'message' => 'Roll Generate successfully',
            'alert-type' => 'success',
        ];
        return redirect('student/role/generate/view')->with($notification);
    }
}
