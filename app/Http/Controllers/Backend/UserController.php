<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        $allData = User::all();

        return view('backend.user.view_user', compact('allData'));
    }


    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
$validatedData = $request->validate([
    'email'=> 'required|unique:users',
    'name'=> 'required',
]);
$data = new User();
$data->usertype = $request->usertype;
$data->name = $request->name;
$data->password =bcrypt( $request->password);
$data->email = $request->email;
$data->save();
$notification = array(
    'message' => 'User added successfully',
    'alert-type' => 'success',
);
return redirect()->route('user.view')->with($notification);
    }
    public function UserEdit($id){

        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate($id, Request $request){
$data = User::find($id);
$data->usertype = $request->usertype;
$data->name = $request->name;

$data->email = $request->email;
$data->save();
$notification = array(
'message' => 'User updated successfully',
'alert-type' => 'info',
);
return redirect()->route('user.view')->with($notification);
    }
}
