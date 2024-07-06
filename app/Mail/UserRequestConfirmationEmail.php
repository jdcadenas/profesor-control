<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRequestConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userRequest;

    public function __construct($userRequest)
    {
        $this->userRequest = $userRequest;
    }

    public function build()
    {
        return $this
            ->to($this->userRequest->school->coordinator_email) // Replace with actual email
            ->from('no-reply@your-app.com')
            ->subject('Solicitud de usuario recibida')
            ->markdown('emails.user-request-confirmation', ['userRequest' => $this->userRequest]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Request Confirmation Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
