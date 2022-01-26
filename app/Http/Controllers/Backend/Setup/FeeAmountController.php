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
 $data['allData'] = FeeAmount::all();
 return view('backend.setup.fee_amount.view_fee_amount', $data);


        
    }
}
