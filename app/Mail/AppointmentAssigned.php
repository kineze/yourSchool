<?php

namespace App\Mail;

use App\Models\Student;
use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $appointment;

    public function __construct(Student $student, Appointment $appointment)
    {
        $this->student = $student;
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->subject('Appointment Assigned')->view('emails.appointment-assigned');
    }
}