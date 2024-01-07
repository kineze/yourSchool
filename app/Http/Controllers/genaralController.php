<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class genaralController extends Controller
{
    public function home(){

            if (auth()->check()) {
                $user = auth()->user();

                if ($user->hasRole('Admin')) {
                    return redirect()->route('adminDashboard');
                } elseif ($user->hasAnyRole(['Manager', 'Coordinator', 'Finance', 'Consultant'])) {
                    return redirect()->route('officeDashboard');
                } elseif ($user->hasRole('Student')) {
                    return redirect()->route('studentDashboard');
                }
        }else{
            return redirect()->route('login');
        }
    }

    public function setDashboard()
    {
        // Check user role and redirect accordingly
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->hasRole('Admin')) {
                return redirect()->route('adminDashboard');
            } elseif ($user->hasAnyRole(['Manager', 'Coordinator', 'Finance', 'Consultant'])) {
                return redirect()->route('officeDashboard');
            } elseif ($user->hasRole('Student')) {
                return redirect()->route('studentDashboard');
            }else{
                return redirect()->route('errorPage');
            }
        }

        // Default redirection if no role is matched
        return redirect('/dashboard');
    }

    public function setNewPass(){


        return view('auth.newPass');
    }

    public function setNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed', // Add any additional validation rules
        ]);

        $AuthUser = Auth::user();

        $user = User::findOrFail($AuthUser->id);

        $tempPass = $request->input('password');
        
        $hashedPassword = Hash::make($request->input('password'));

        $user->update([
            'password' => $hashedPassword,
            'pass_reset' => 0,
        ]);

        Auth::login($user);

        $notification = [
            'message' => 'password changed succesfully. please re login with new password',
            'alert-type' => 'success'
        ];

        return redirect()->route('home')->with($notification);
        // return redirect()->route('showPass', ['id' => $user->id, 'tempPass' => $tempPass])->with($notification);
    }
    
    public function sysUsers(){

        $authUser = Auth::user();

        // If the authenticated user is a Manager, get specific roles
        if ($authUser->hasRole('Manager')) {
            $allowedRoles = ['Coordinator', 'Finance', 'Manager', 'Consultant'];
            $users = User::role($allowedRoles)->get();
        }
        // If the authenticated user is an Admin, get all users
        elseif ($authUser->hasRole('Admin')) {
            $users = User::get();
        }
        // If the authenticated user has a different role, show a message
        else {
            $users = collect(); // or any default behavior you want
            $message = 'You do not have permission to view this page.';
            $notification = [
                'message' => $message,
                'alert-type' => 'error',
            ];

            return back()->with($notification);
        }

        return view('admin.allUsers', compact('users'));
    }

    public function showPass($id, $tempPass){

        $user = User::findOrFail($id);

        $password =  $tempPass;

        return view('admin.showPass', compact('user', 'password'));
    }
}
