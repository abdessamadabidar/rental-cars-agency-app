<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private readonly User $user)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Changer mot de passe',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $id = $this->user->id;
        $created_at = $this->user->created_at;
        $href = url('') . '/reset_password/' . base64_encode($id . '///' . $created_at);
        return new Content(
            view: 'email.reset_password',
            with: [
                'first_name' => $this->user->first_name,
                'href' => $href,
            ],
        );
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
