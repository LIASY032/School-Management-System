<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\FeeCategory;

class FeeAmountController extends Controller
{
    //

    public function ViewFeeAmount(){
 $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
 return view('backend.setup.fee_amount.view_fee_amount', $data);


        
    }
    public function FeeAmountAdd(){

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
 return view('backend.setup.fee_amount.add_fee_amount' , $data);
    }


    public function FeeAmountStore(Request $request){

        $countClass = count($request->class_id);
        if ($countClass != NULL){
            for ($i = 0; $i < $countClass; $i++){

                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            }
        }
         $notification = array(
      'message' => 'Fee Amount Added successfully',
      'alert-type' => 'success',
      );
      return redirect()->route('fee.amount.view')->with($notification);


    }

}
