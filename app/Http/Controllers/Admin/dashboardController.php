<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function getAdminDashboard(){

        

        return view('admin.Dashboard');
    }
}
