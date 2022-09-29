<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Verlanglijstjes\User;

class UpcomingBirthdayReminder extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function build()
    {
        return $this->view('emails.upcoming-birthday-reminder', [
            'user' => $this->user,
        ]);
    }
}
