<?php

namespace App\ECommerce\Client\Emails;

use App\ECommerce\Client\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use function Monolog\toArray;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    private Client $client;
    /**
     * Create a new message instance.
     */
    public function __construct($email, public $token)
    {
        $this->client = Client::where('email', $email)->first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
//            subject: '',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
//            view: ''
        );
    }

    public function build()
    {
        return $this
            ->subject('Here are you the link for resetting your password')
            ->markdown('Web.Auth.reset', [
                'client' => $this->client,
                'token'  => $this->token
            ]);
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
