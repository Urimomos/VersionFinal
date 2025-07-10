<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection; // <-- Importar Collection

class NewQuoteNotification extends Mailable
{
    use Queueable, SerializesModels;

    // Propiedad pública para guardar las cotizaciones
    public Collection $quotes;

    /**
     * Create a new message instance.
     */
    public function __construct(Collection $quotes)
    {
        $this->quotes = $quotes;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Cotización Guardada - Fixme',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Le decimos que use una vista de Blade para el cuerpo del correo
        return new Content(
            view: 'emails.new-quote',
        );
    }
}