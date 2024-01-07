<?php

namespace App\Http\Controllers\Office;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class officeDashController extends Controller
{
    public function getOfficeDashboard(){

        $user = Auth::user();

        return view('office.dashboard', compact('user'));
    }

    public function officeUsers(){

        $rolesToQuery = ['Coordinator', 'Finance', 'Manager', 'Consultant'];

        $users = User::role($rolesToQuery)->get();

        dd($users);
        
    }
}
