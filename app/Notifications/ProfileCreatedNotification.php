<?php

namespace App\Notifications;

use App\Mail\ProfileCreatedMail;
use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

final class ProfileCreatedNotification extends Notification
{
    use Queueable;

    private string $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via(): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  Employee  $notifiable
     * @return \App\Mail\ProfileCreatedMail
     */
    public function toMail(Employee $notifiable): ProfileCreatedMail
    {
        return (new ProfileCreatedMail($notifiable, $this->password))
            ->to($notifiable->email);
    }
}
