<?php

namespace App\Listeners;

use App\Events\SendPasswordViaEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPasswordViaEmailListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(SendPasswordViaEmail $event)
    {
        $user = $event->user;
        $password = $event->password;

        // Customize the welcome message and other content
        $welcomeMessage = "Welcome to Skygate International!\n\nWelcome to the team. We're looking forward to doing great things together.\n\nHere are your account details. Please use this login to access the dashboard:\n\nUsername: {$user->name}\nPassword: $password";

        $emailContent = "$welcomeMessage\n\nIf you have any questions or need assistance, feel free to contact us.";

        Mail::raw($emailContent, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Welcome to Skygate International');
        });
    }
}