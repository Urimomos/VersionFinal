<?php

namespace App\Mail;

use App\Models\Quote; // <-- Importar
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteCompletedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public Quote $quote;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Tu Reparación en Fixme está Lista!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-completed',
        );
    }
}