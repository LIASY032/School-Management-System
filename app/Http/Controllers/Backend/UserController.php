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
$data->password = $request->password;
$data->email = bcrypt($request->email);
$data->save();
$notification = array(
    'message' => 'User added successfully',
    'alert-type' => 'success',
);
return redirect()->route('user.view')->with($notification);
    }
}
