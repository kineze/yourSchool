<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Events\SendPasswordViaEmail;
use App\Models\Country;
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
            'send_password_email' => 'nullable|boolean',
        ]);

        $AuthUser = Auth::user();

        $userEmailSet = $request->input('send_password_email');

        $user = User::findOrFail($AuthUser->id);

        $tempPass = $request->input('password');
        
        $hashedPassword = Hash::make($request->input('password'));

        $user->update([
            'password' => $hashedPassword,
            'pass_reset' => 0,
        ]);

        if (isset($userEmailSet) && $userEmailSet) {
            event(new SendPasswordViaEmail($user, $tempPass));
        }

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

    public function getUpdateUser($id){

        $user = User::findOrfail($id);
        $userRoles = $user->roles->pluck('name')->toArray();

        return view('admin.updateUser', compact('user', 'userRoles'));
    }


    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'roles' => 'array|required',
            // Add any other validation rules as needed
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('UserName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        // Sync roles with the user
        $roleNames = $request->input('roles');
        $roleIds = Role::whereIn('name', $roleNames)->pluck('id')->toArray();
        $user->roles()->sync($roleIds);

        $notification = [
            'message' => 'User updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function updateUserPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'reset_password' => 'nullable|boolean',
            'send_password_email' => 'nullable|boolean',
        ]);

        $user = User::findOrFail($id);

        $userpass = $request->input('reset_password');
        $userEmailSet = $request->input('send_password_email');
        $tempPass = $request->input('password');

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        if (isset($userpass) && $userpass) {
            $user->update(['pass_reset' => 1]);
        }

        if (isset($userEmailSet) && $userEmailSet) {
            event(new SendPasswordViaEmail($user, $tempPass));
        }

        $notification = [
            'message' => 'Password updated successfully',
            'alert-type' => 'success',
        ];

        $authUser = Auth::user();

        if($user->id == $authUser->id){
            return redirect()->route('home')->with($notification);
        }

        return redirect()->back()->with($notification);
    }

    
}
