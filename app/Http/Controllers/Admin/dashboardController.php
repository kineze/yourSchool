<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function getAdminDashboard(){

        $user = Auth::user();

        return view('admin.Dashboard', compact('user'));
    }

}
