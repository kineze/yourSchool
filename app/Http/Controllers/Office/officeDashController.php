<?php

namespace App\Http\Controllers\Office;

use App\Models\User;
use App\Models\Student;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class officeDashController extends Controller
{
    public function getOfficeDashboard(){

        $user = Auth::user();

        $students = Student::get();

        $consultants = User::role('Consultant')->get();

        $appointment = Appointment::get();

        return view('office.dashboard', compact('user','students','consultants','appointment'));
    }

    public function officeUsers(){

        $rolesToQuery = ['Coordinator', 'Finance', 'Manager', 'Consultant'];

        $users = User::role($rolesToQuery)->get();

        dd($users);
        
    }
}
