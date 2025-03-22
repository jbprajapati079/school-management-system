<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
class StudentYearController extends Controller
{
    public function studentyearview(){

        $data = StudentYear::all();
        return view('backend.user.year.viewyear',compact('data'));
    }

    public function addstudentyear(){
        return view('backend.user.year.addstudentyear');
    }

    public function storestudentyear(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Year field is required'
        ]
        );
        $student = new StudentYear;
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/year/view')->with($notification);
    }

    public function editstudentyear($id){

        $editstudentyear = StudentYear::find($id);
        return view('backend.user.year.editstudentyear',compact('editstudentyear'));
    }

    public function updatestudentyear(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ],
        [
            'name.required' => 'Year field is required'
        ]
        );
        $student = StudentYear::find($id);
        $student->name = $request->name;
        $student->save();
        
        $notification = [
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/year/view')->with($notification);
    }

    public function deletestudentyear($id){

        $deletestudentdata = StudentYear::find($id)->delete();
        $notification = [
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/student/year/view')->with($notification,$deletestudentdata);
    }
    
}
