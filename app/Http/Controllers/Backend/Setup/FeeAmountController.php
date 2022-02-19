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

      public function FeeAmountEdit($fee_category_id){

      $data['editData']= FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
$data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

      return view('backend.setup.fee_amount.edit_fee_amount',$data); 
      }
      public function FeeAmountUpdate(Request $request, $fee_category_id){
 
 
        if ($request->class_id == NULL){
            $notification = array(
      'message' => 'Sorry you do not select any class amount',
      'alert-type' => 'error',
      );
      return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);

     
        } else{

        $countClass = count($request->class_id);

        FeeAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++){

                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            }
        
         $notification = array(
      'message' => 'Fee Amount Updated successfully',
      'alert-type' => 'success',
      );
      return redirect()->route('fee.amount.view')->with($notification);


        }
      }
    //   public function FeeAmountDelete($fee_category_id){
    //   $user = FeeCategory::find($id);
    //   $user->delete();
    //   $notification = array(
    //   'message' => 'Fee  Category Deleted successfully',
    //   'alert-type' => 'info',
    //   );
    //   return redirect()->route('fee.category.view')->with($notification);

    //   }


      public function FeeAmountDetails($fee_category_id){


      $data['allData']= FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

      return view('backend.setup.fee_amount.details_fee_amount',$data); 

      }


}
