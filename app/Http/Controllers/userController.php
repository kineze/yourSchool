<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function getNewUser() {

        $user = Auth::user();

        return view('admin.newUser', compact('user'));
    }
}
