<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class QuoteConfirmationForUser extends Mailable
{
    use Queueable, SerializesModels;

    public Collection $quotes;

    public function __construct(Collection $quotes)
    {
        $this->quotes = $quotes;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de tu Cotización en Fixme', // Asunto para el cliente
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-confirmation', // Usaremos una nueva vista
        );
    }
}