<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class UserWelcomeEmail extends Mailable
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Welcome to the Platform')
                    ->view('emails.user_welcome', ['user' => $this->user]);
    }
}

class NewUserNotification extends Mailable
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('New User Created')
                    ->view('emails.new_user', ['user' => $this->user]);
    }
}
