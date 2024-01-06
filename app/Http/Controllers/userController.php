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

        $user = new User();
        $user->name = $validatedData['UserName'];
        $user->email = $validatedData['email'];
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
    

        // Redirect or respond as needed
        return redirect()->route('your.redirect.route'); // Adjust 'your.redirect.route' to your actual route
    }
}
