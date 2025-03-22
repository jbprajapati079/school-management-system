<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function designationview(){

        $data = Designation::latest()->get();
        return view('backend.user.designation.designationview',compact('data'));
    }

    public function designationadd(){

        $data = Designation::latest()->get();
        return view('backend.user.designation.designationadd');
    }

    public function designationstore(Request $request){

        $validated = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Designation field is required'
        ]); 

        $data = new Designation;
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/designation/view')->with($notification);
    }

    public function designationedit($id){

        $data = Designation::find($id);
        return view('backend.user.designation.designationedit',compact('data'));
    }

    public function designationupdate(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Designation field is required'
        ]); 

        $data = Designation::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/designation/view')->with($notification);
    }

    public function designationdelete($id){

        $data = Designation::find($id)->delete();
        $notification = [
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/designation/view')->with($notification);
    }
}


