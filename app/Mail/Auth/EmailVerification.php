<?php

namespace App\Mail\Auth;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Employee
     */
    private Employee $employee;

    /**
     * @var string
     */
    private string $verificationUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, string $verificationUrl)
    {
        $this->employee = $employee;
        $this->verificationUrl = $verificationUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Подтверждение электронной почты')
            ->view('mails.verification')
            ->with('username', $this->employee->first_name)
            ->with('verificationUrl', $this->verificationUrl);
    }
}
