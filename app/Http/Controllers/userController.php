<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Events\SendPasswordViaEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function getNewUser() {

        $user = Auth::user();

        return view('admin.newUser', compact('user'));
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15', // You may want to adjust the max length based on your needs
            'password' => 'required|string|min:6|confirmed',
            'reset_password' => 'nullable|boolean',
            'send_password_email' => 'nullable|boolean',
            'roles' => ['array', 'required', function ($attribute, $value, $fail) {
                if (empty($value)) {
                    $fail('Please select at least one role.');
                }
            }],
        ]);

        $tempPass = $validatedData['password'];

        $user = new User();
        $user->name = $validatedData['UserName'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // Update pass_reset if the checkbox is selected
        if (isset($validatedData['reset_password']) && $validatedData['reset_password']) {
            $user->update(['pass_reset' => 1]);
        }


        // Sync roles with the user
        if (!empty($validatedData['roles'])) {
            // Assuming you have a roles() method in your User model
            $roleIds = Role::whereIn('name', $validatedData['roles'])->pluck('id')->toArray();
            $user->roles()->sync($roleIds);
        }

        if (isset($validatedData['send_password_email']) && $validatedData['send_password_email']) {
            event(new SendPasswordViaEmail($user, $validatedData['password']));
        }

        $notification = [
            'message' => 'user created succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('showPass', ['id' => $user->id, 'tempPass' => $tempPass])->with($notification);
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);

        if ($user->hasRole('Admin') && User::role('Admin')->count() === 1) {
            $notification = [
                'message' => 'Cannot delete the last admin. At least one admin should be present.',
                'alert-type' => 'error'
            ];
    
            return back()->with($notification);
        }

        $user->delete();

        $notification = [
            'message' => 'user delete successfully',
            'alert-type' => 'error'
        ];

        return back()->with($notification);
    }
   
}
