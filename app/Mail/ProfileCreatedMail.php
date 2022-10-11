<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfileCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Employee
     */
    private Employee $employee;

    /**
     * @var string
     */
    private string $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, string $password)
    {
        $this->employee = $employee;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Добро пожаловать в систему')
            ->view('mails.profile_created')
            ->with('username', $this->employee->first_name)
            ->with('password', $this->password);
    }
}
