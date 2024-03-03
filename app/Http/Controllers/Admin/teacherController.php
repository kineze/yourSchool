<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class teacherController extends Controller
{
    public function teachers(){

        $user = Auth::user();

        $teacherRole = Role::where('name', 'Teacher')->first();

        $users = $teacherRole->users;

        return view('admin.teachers', compact('user', 'users'));
    }

    public function newTeacher(){

        $user = Auth::user();

        return view('admin.newTeacher', compact('user'));
    }
}
