<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\Path\Move;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileview(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profileview',compact('user'));
    }

    public function profileedit(){
        $id = Auth::user()->id;
        $userdata = User::find($id);
        return view('backend.user.editprofile',compact('userdata'));
    }

    public function profileupdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->gender = $request->gender;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;

        if ($request->file('image')) {
           $file = $request->file('image');
           @unlink(public_path('upload/user_image' .$data->image));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file-> move(public_path('upload/user_image'), $filename);
           $data['image'] = $filename;
        }
        $data->save();
        $notification = [
            'message' => 'Profile User Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('profile/view')->with($notification);
    }

    public function profilechangepassword(){
        return view('backend.user.profile_change_password');
    }

    public function profileupdatepassword(Request $request){
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashpassword = Auth::user()->password;

        if (Hash::check($request->current_password,$hashpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }
        else{
            return redirect()->back();
        }
    }
}
