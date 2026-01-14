<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $replyMessage;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, $replyMessage)
    {
        $this->contact = $contact;
        $this->replyMessage = $replyMessage;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Se o subject for nulo, usa um texto padrão
        $subject = $this->contact->subject ?? 'Resposta ao seu contacto';

        return $this->subject($subject)
                    ->view('emails.contact-reply');
    }
}