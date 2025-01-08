<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEmployeeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;

    /**
     * Create a new message instance.
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Employee Added') // Set subject
                    ->view('emails.new_employee_notification') // Gunakan view yang benar
                    ->with([
                        'employee' => $this->employee, // Kirim data employee ke view
                    ]);
    }
}
