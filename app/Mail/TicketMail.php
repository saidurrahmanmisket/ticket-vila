<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $ticketNumbers;

    /**
     * Create a new message instance.
     */
    public function __construct($order, array $ticketNumbers)
    {
        $this->order = $order;
        $this->ticketNumbers = $ticketNumbers;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Ticket Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
    public function build()
    {
        $email = $this->view('emails.ticket')
            ->subject('Your Tickets and eBooks')
            ->with([
                'order' => $this->order,
                'ticketNumbers' => $this->ticketNumbers,
            ]);

        // Path of the ebook file
        $ebookPath = public_path('uploads/gifts/ebook.pdf');

        // Attach an ebook for each ticket number
        foreach ($this->ticketNumbers as $ticketNumber) {
            $email->attachData(file_get_contents($ebookPath), 'ebook-' . $ticketNumber . '.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $email;
    }
}
