<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class officeDashController extends Controller
{
    public function getOfficeDashboard(){

        $user = Auth::user();

        $userPass = $user->pass_reset;

        if ($userPass == 1) {
            
        }

        return view('office.dashboard', compact('user'));
    }
}
