<?php
namespace App\Mail;
use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteCancelledNotification extends Mailable
{
    use Queueable, SerializesModels;
    public Quote $quote;
    public function __construct(Quote $quote) { $this->quote = $quote; }
    public function envelope(): Envelope { return new Envelope(subject: 'Una Cotización ha sido Cancelada'); }
    public function content(): Content { return new Content(view: 'emails.quote-cancelled'); }
}