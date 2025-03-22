<?php

namespace App\Http\Controllers\backend\setup;

use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FeeAmountController extends Controller
{
    public function feeamountview(){
        $data = FeeAmount::select('fee_category_id',DB::raw("count(*) as total_fee_category"))
        ->groupBy('fee_category_id')->get();
        return view('backend.user.feeamount.viewfeeamount',compact('data'));
    }
    public function addfeeamount(){

        $data['feecategories'] = FeeCategory::all();
        $data['class'] = StudentSetup::all();
        return view('backend.user.feeamount.addfeeamount',$data);
    }

    public function storefeeamount(Request $request){
        $classcount = count($request->class_id);

        if ($classcount != null) {
           
            for ($i=0; $i <$classcount ; $i++) { 
               
                $data = new FeeAmount;
                $data->fee_category_id = $request->fee_category_id;
                $data->class_id = $request->class_id[$i];
                $data->amount = $request->amount[$i];
                $data->save();
            }
        }

        $notification = [
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/fee/amount/view')->with($notification);
    }

    public function editfeeamount($fee_category_id){

        $data['editdata'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();
        $data['feecategories'] = FeeCategory::all();
        $data['class'] = StudentSetup::all();
        return view('backend.user.feeamount.editfeeamount',$data);
    }

    public function updatefeeamount(Request $request,$fee_category_id){

        if ($request->class_id == null)  {

            $notification = [
                'message' => 'Sorry Please Select the student class and amount',
                'alert-type' => 'error'
            ];
            return redirect()->route('edit.fee.amount',$fee_category_id)->with($notification);
        }
        else{
            $classcount = count($request->class_id);

            FeeAmount::where('fee_category_id',$fee_category_id)->delete();
           
            for ($i=0; $i <$classcount ; $i++) { 
               
                $data = new FeeAmount;
                $data->fee_category_id = $request->fee_category_id;
                $data->class_id = $request->class_id[$i];
                $data->amount = $request->amount[$i];
                $data->save();
            }


        $notification = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect('setup/fee/amount/view')->with($notification);
        }
    }

    public function detailsfeeamount($fee_category_id){

        $data['details'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();
        $data['feecategories'] = FeeCategory::all();
        $data['class'] = StudentSetup::all();
        $data['amounts'] = FeeAmount::all();
        return view('backend.user.feeamount.detailsfeeamount',$data);
    }
}

