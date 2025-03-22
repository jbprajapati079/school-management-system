<?php

namespace App\Http\Controllers\backend\student;

use App\Models\User;
use App\Models\Discount;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentSetup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function registrationview()
    {

        $StudentSetup = StudentSetup::all();
        $StudentYear = StudentYear::all();
        $firstyeardata = StudentYear::orderBy('id', 'desc')->first()->id;
        $firstclassdata = StudentSetup::orderBy('id', 'desc')->first()->id;
        $data = AssignStudent::where('student_year_id',$firstyeardata)->where('student_class_id',$firstclassdata)->get();
   
        return view('backend.student.registration.registrationview', compact(['data','StudentSetup','StudentYear','firstyeardata','firstclassdata']));
    }


    
    public function serachstudent(Request $request)
    {

        $StudentSetup = StudentSetup::all();
        $StudentYear = StudentYear::all();
        $firstyeardata = $request->student_year_id;
        $firstclassdata = $request->student_class_id;
        $data = AssignStudent::where('student_year_id',$request->student_year_id)->where('student_class_id',$request->student_class_id)->get();
        return view('backend.student.registration.registrationview', compact(['data','StudentSetup','StudentYear','firstyeardata','firstclassdata']));
    }
    public function registrationadd()
    {
        $StudentYear = StudentYear::all();
        $StudentGroup = StudentGroup::all();
        $StudentSetup = StudentSetup::all();
        $StudentShift = StudentShift::all();
        return view('backend.student.registration.registrationadd', compact(['StudentYear', 'StudentGroup', 'StudentSetup', 'StudentShift']));
    }

    public function registrationstore(Request $request)
    {

        DB::transaction(function () use ($request) {
            $checkyear = StudentYear::find($request->student_year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESc')->first();

            if ($student == null) {

                $firstreg = 0;
                $stdregid = $firstreg + 1;

                if ($stdregid < 10) {
                    $id_no  = '000' . $stdregid;
                } elseif ($stdregid < 100) {
                    $id_no  = '00' . $stdregid;
                } elseif ($stdregid < 1000) {
                    $id_no  = '0' . $stdregid;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESc')->first()->id;
                $studentid = $student + 1;

                if ($studentid < 10) {
                    $id_no  = '000' . $studentid;
                } elseif ($studentid < 100) {
                    $id_no  = '00' . $studentid;
                } elseif ($studentid < 1000) {
                    $id_no  = '0' . $studentid;
                }
            }

            $final_id = $checkyear . $id_no;
            $user = new User;
            $code = rand(0000, 9999);
            $user->id_no = $final_id;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fathername = $request->fathername;
            $user->mothername = $request->mothername;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->religion  = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->address  = $request->address;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_image'), $filename);
                $user['image'] = $filename;
            }

            $user->save();

            $AssignStudent = new AssignStudent;
            $AssignStudent->student_id = $user->id;
            $AssignStudent->student_class_id = $request->student_class_id;
            $AssignStudent->student_group_id = $request->student_group_id;
            $AssignStudent->student_shift_id = $request->student_shift_id;
            $AssignStudent->student_year_id = $request->student_year_id;
            $AssignStudent->save();

            $Discount = new Discount;
            $Discount->assign_student_id = $AssignStudent->id;
            $Discount->fee_category_id = '1';
            $Discount->discount = $request->discount;
            $Discount->save();

        });

        $notification = [
            'message' => 'Student Registration Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('student/registration/view')->with($notification);
    }

    public function registrationedit($student_id)
    {
        $StudentYear = StudentYear::all();
        $StudentGroup = StudentGroup::all();
        $StudentSetup = StudentSetup::all();
        $StudentShift = StudentShift::all();
        $data = AssignStudent::where('student_id',$student_id)->with(['student','dicount'])->first();
        return view('backend.student.registration.registrationedit', compact(['data','StudentSetup','StudentYear','StudentGroup','StudentShift']));
    }

    public function registrationupdate(Request $request,$student_id)
    {

        DB::transaction(function () use ($request,$student_id) {
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fathername = $request->fathername;
            $user->mothername = $request->mothername;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->religion  = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->address  = $request->address;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_image'.$user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_image'), $filename);
                $user['image'] = $filename;
            }

            $user->save();

            $AssignStudent = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $AssignStudent->student_class_id = $request->student_class_id;
            $AssignStudent->student_group_id = $request->student_group_id;
            $AssignStudent->student_shift_id = $request->student_shift_id;
            $AssignStudent->student_year_id = $request->student_year_id;
            $AssignStudent->save();

            $Discount = Discount::where('assign_student_id',$request->id)->first();
            $Discount->discount = $request->discount;
            $Discount->save();

        });

        $notification = [
            'message' => 'Student Registration Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('student/registration/view')->with($notification);
    }

    public function registrationpromot($student_id)
    {
        $StudentYear = StudentYear::all();
        $StudentGroup = StudentGroup::all();
        $StudentSetup = StudentSetup::all();
        $StudentShift = StudentShift::all();
        $data = AssignStudent::where('student_id',$student_id)->with(['student','dicount'])->first();
        return view('backend.student.registration.registrationpromot', compact(['data','StudentSetup','StudentYear','StudentGroup','StudentShift']));
    }

    public function registrationupdatepromot(Request $request,$student_id)
    {

        DB::transaction(function () use ($request,$student_id) {
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fathername = $request->fathername;
            $user->mothername = $request->mothername;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->religion  = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->address  = $request->address;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_image'.$user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_image'), $filename);
                $user['image'] = $filename;
            }

            $user->save();

            $AssignStudent = new AssignStudent();
            $AssignStudent->student_id = $student_id;
            $AssignStudent->student_class_id = $request->student_class_id;
            $AssignStudent->student_group_id = $request->student_group_id;
            $AssignStudent->student_shift_id = $request->student_shift_id;
            $AssignStudent->student_year_id = $request->student_year_id;
            $AssignStudent->save();

            $Discount = new Discount();
            $Discount->assign_student_id = $AssignStudent->id;
            $Discount->fee_category_id = '1';
            $Discount->discount = $request->discount;
            $Discount->save();

        });

        $notification = [
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('student/registration/view')->with($notification);
    }

    public function registrationdetail($student_id){

        $data = AssignStudent::where('student_id',$student_id)->with(['student','dicount','student_year','student_group','student_shift','student_class'])->first();
      
        return view('backend.student.registration.details_pdf',compact('data'));
    }
}

