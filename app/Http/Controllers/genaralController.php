<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class genaralController extends Controller
{
    public function home(){


        return view('auth.login');
    }
}
