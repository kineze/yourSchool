<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class genaralController extends Controller
{
    public function home(){

        return view('auth.login');
    }
}
