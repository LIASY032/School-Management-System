<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;
class AssignSubjectController extends Controller
{
    
    public function ViewAssignSubject(){
    $data['allData'] = AssignSubject::all();
    return view('backend.setup.assign_subject.view_assign_subject', $data);


    }

    public function AssignSubjectAdd(){

    $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();


    return view('backend.setup.assign_subject.add_assign_subject', $data);
    }
    public function AssignSubjectStore(Request $request){

    $validateData = $request->validate(['name' => 'required|unique:assign_subjects,name']);
    $data = new AssignSubject();
    $data->name = $request->name;
    $data->save();
    $notification = array(
    'message' => 'Assign Subject Added successfully',
    'alert-type' => 'success',
    );
    return redirect()->route('exam.type.view')->with($notification);

    }

    public function AssignSubjectEdit($id){

    $editData = AssignSubject::find($id);
    return view('backend.setup.assign_subject.edit_assign_subject', compact('editData'));
    }
    public function AssignSubjectUpdate(Request $request, $id){
    $data = AssignSubject::find($id);

    $validateData = $request->validate(['name' => 'required|unique:assign_subjects,name,'. $data->id]);

    $data->name = $request->name;
    $data->save();
    $notification = array(
    'message' => 'Assign Subject Updated successfully',
    'alert-type' => 'success',
    );
    return redirect()->route('exam.type.view')->with($notification);

    }
    public function AssignSubjectDelete($id){
    $user = AssignSubject::find($id);
    $user->delete();
    $notification = array(
    'message' => 'Assign Subject Deleted successfully',
    'alert-type' => 'info',
    );
    return redirect()->route('exam.type.view')->with($notification);

    }
}
