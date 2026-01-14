<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitCancelledMail extends Mailable
{
    use Queueable, SerializesModels;
    public $visit;

    public function __construct($visit)
    {
        $this->visit = $visit;
    }

    public function build()
    {
        return $this->subject('Atualização sobre a sua Visita - Museu')
            ->view('emails.visit-cancelled');
    }
}
