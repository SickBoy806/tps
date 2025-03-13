<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\InternshipApplication;

class InternshipApplicationReceived extends Notification
{
    use Queueable;

    protected $application;

    public function __construct(InternshipApplication $application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Internship Application Received')
            ->line('A new internship application has been submitted.')
            ->line('Internship: ' . $this->application->internship_title)
            ->line('Applicant: ' . $this->application->full_name)
            ->line('Email: ' . $this->application->email)
            ->action('View Application', url('/admin/applications/' . $this->application->id));
    }
}