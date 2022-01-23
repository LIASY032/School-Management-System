<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){
 $data['allData'] = FeeCategory::all();
 return view('backend.setup.fee_category.view_fee_cat', $data);

    }
      public function FeeCatAdd(){
      return view('backend.setup.fee_category.add_fee_cat');
      }
      public function FeeCatStore(Request $request){

      $validateData = $request->validate(['name' => 'required|unique:fee_categories,name']);
      $data = new FeeCategory();
      $data->name = $request->name;
      $data->save();
      $notification = array(
      'message' => 'Fee Category Added successfully',
      'alert-type' => 'success',
      );
      return redirect()->route('fee.category.view')->with($notification);

      }

      public function FeeCatEdit($id){

      $editData = FeeCategory::find($id);
      return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
      }
      public function FeeCatUpdate(Request $request, $id){
      $data = FeeCategory::find($id);

      $validateData = $request->validate(['name' => 'required|unique:student_classes,name,'. $data->id]);

      $data->name = $request->name;
      $data->save();
      $notification = array(
      'message' => 'Fee Category Updated successfully',
      'alert-type' => 'success',
      );
      return redirect()->route('fee.category.view')->with($notification);

      }
      public function FeeCatDelete($id){
      $user = FeeCategory::find($id);
      $user->delete();
      $notification = array(
      'message' => 'Fee  Category Deleted successfully',
      'alert-type' => 'info',
      );
      return redirect()->route('fee.category.view')->with($notification);

      }

}
