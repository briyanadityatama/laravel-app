<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;
use App\Mail\UserWelcomeEmail;

class SendUserNotification
{
    public function handle(UserCreated $event)
    {
        // Send welcome email to the user
        Mail::to($event->user->email)->send(new UserWelcomeEmail($event->user));

        // Notify admin
        Mail::to(config('mail.admin_address'))->send(new NewUserNotification($event->user));
    }
}
