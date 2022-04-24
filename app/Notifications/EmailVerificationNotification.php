<?php

namespace App\Notifications;

use App\Mail\Auth\EmailVerificationMail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerificationNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \App\Mail\Auth\EmailVerificationMail
     */
    public function toMail($notifiable): EmailVerificationMail
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return new EmailVerificationMail($notifiable, $verificationUrl);
    }
}
