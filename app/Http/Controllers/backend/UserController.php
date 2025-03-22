<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewuser(){

        $alluser = User::where('usertype','admin')->get();
        return view('backend.user.viewuser',compact('alluser'));
    }

    public function adduser(){

        return view('backend.user.adduser');
    }

    public function storeuser(Request $request){


        $data = new User();
        $code = rand(0000,9999);
        $data->role = $request->input('role');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->usertype = 'Admin';
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->save();

        $notification = [
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('user/view')->with($notification);
    }

    public function edituser($id){

        $userdata = User::find($id);
        return view('backend.user.edituser',compact('userdata'));
    }

    public function updateuser(Request $request,$id){


        $data = User::Find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->usertype = $request->input('usertype');
        $data->password = Hash::make($request->input('password'));
        $data->save();

        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('user/view')->with($notification);
    }

    public function deleteuser($id){

        $deleteuser = User::find($id)->delete();
        $notification = [
            'message' => 'User Delete Successfully',
            'alert-type' => 'success',
        ];
        return redirect('user/view')->with($notification);
    }
}
