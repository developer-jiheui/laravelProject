<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Contact Message from ' . $this->data['senderName'],
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.contact',
            with: ['data' => $this->data]
        );
    }

    public function attachments()
    {
        return [];
    }
}
