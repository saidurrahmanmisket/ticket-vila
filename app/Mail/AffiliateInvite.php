<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AffiliateInvite extends Mailable
{
    use Queueable, SerializesModels;

    public string $referralLink;

    /**
     * Create a new message instance.
     */
    public function __construct(string $referralLink)
    {
        $this->referralLink = $referralLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            bcc: ['email@yourfreeimmoin.eu'],
            subject: 'Affiliate Invite Link'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.affiliate-invite-link',
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
