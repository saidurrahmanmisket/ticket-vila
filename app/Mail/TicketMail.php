<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;

    public $ticketNumbers;

    public $files;

    /**
     * Create a new message instance.
     */
    public function __construct($order, array $ticketNumbers, array $files)
    {
        $this->order = $order;
        $this->ticketNumbers = $ticketNumbers;
        $this->files = $files;
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
     * @return TicketMail
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

        // Attach an ebook for each ticket number
        foreach ($this->ticketNumbers as $ticketNumber) {
            foreach ($this->files as $file) {
                $file = storage_path('app/'.$file);
                $fileInfo = pathinfo($file);
                $email->attachData(file_get_contents($file), $fileInfo['filename'].'('.$ticketNumber.').'.$fileInfo['extension'], [
                    'mime' => mime_content_type($file),
                ]);
            }
        }

        return $email;
    }
}
