<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function feecategoryview(){

        $data = FeeCategory::latest()->get();
        return view('backend.user.feecategoty.viewfeecategoty',compact('data'));
    }

    public function addfeecategory(){

        return view('backend.user.feecategoty.addfeecategory');
    }

    public function storefeecategory(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ],
        [
            'name.required' => 'fee category field is required'
        ]
        );
        $storefeecategory = new FeeCategory;
        $storefeecategory->name = $request->name;
        $storefeecategory->save();

        $notification = [
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/fee/category/view')->with($notification);
    }

    public function editfeecategory($id){

        $editfeecategorydata = FeeCategory::find($id);
        return view('backend.user.feecategoty.editfeecategoty',compact('editfeecategorydata'));
    }

    public function updatefeecategory(Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ],
        [
            'name.required' => 'fee category field is required'
        ]
        );
        $data = FeeCategory::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/fee/category/view')->with($notification);
    }

    public function deletefeecategory($id){

        $deltefeecategorydata = FeeCategory::find($id)->delete();
        $notification = [
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/fee/category/view')->with($notification,$deltefeecategorydata);
    }
}
