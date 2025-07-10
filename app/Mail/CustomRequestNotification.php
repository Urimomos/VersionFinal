<?php

namespace App\Mail;

use App\Models\CustomRequest; // <-- Importar el modelo
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    // Propiedad pública para guardar la solicitud
    public CustomRequest $customRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(CustomRequest $customRequest)
    {
        $this->customRequest = $customRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Solicitud de Cotización Personalizada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.custom-request', // Usaremos esta nueva vista
        );
    }
}