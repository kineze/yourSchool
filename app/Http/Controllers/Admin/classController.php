<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class classController extends Controller
{

    public function classes(){

        $user = Auth::user();

        $classes = SchoolClass::get();

        $teacherRole = Role::where('name', 'Teacher')->first();

        $teachers = $teacherRole->users;

        return view('admin.classes', compact('user', 'teachers', 'classes'));
    }

    public function storeClass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'teacher' => 'required|exists:users,id', // Assuming the 'teacher' field corresponds to the user ID
            'fee' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $class = new SchoolClass();
    
        $class->name = $request->input('name');
        $class->teacher_id = $request->input('teacher');
        $class->amount = $request->input('fee');
        
        $class->save();

        $notification = [
            'message' => 'Class added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('class', $class->id)->with($notification,'success', 'Class deleted successfully!');
    }

    public function class($id){

        $user = Auth::user();

        $class = SchoolClass::findOrFail($id);

        return view('admin.class', compact('user', 'class'));
    }

    public function deleteClass($id){

        $class = SchoolClass::findOrFail($id);

        $class->delete();

        $notification = [
            'message' => 'Class deleted successfully',
            'alert-type' => 'error',
        ];

        return redirect()->route('classes')->with($notification,'success', 'class deleted successfully!');
    }

    public function updateClass(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'teacher' => 'required|exists:users,id',
            'fee' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the class by ID
        $class = SchoolClass::findOrFail($id);

       
        $class->name = $request->input('name');
        $class->teacher_id = $request->input('teacher');
        $class->amount = $request->input('fee');

        $class->save();

        $notification = [
            'message' => 'Class Update successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('classes')->with($notification,'success', 'class updated successfully!');
    }
}
