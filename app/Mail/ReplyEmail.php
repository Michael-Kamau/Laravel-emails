<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;

class ReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $payload;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $payload)
    {

        $this->payload = $payload;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Fresh New Laravel',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
//            view: 'emails.reply',
            html: 'emails.reply',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }



    /**
     * Get the message headers.
     *
     * @return \Illuminate\Mail\Mailables\Headers
     */
    public function headers()
    {
        if(!isset($this->payload['messageId'])){
            return  new Headers(
            );
        }
        else{
            return new Headers(
                references: isset($this->payload['references']) ? [$this->payload['references'], $this->payload['messageId'] ?? ''] : [],
                text: [
                    'In-Reply-To' => '<'.$this->payload['messageId'].'>'
                ],
            );
        }

    }
}
