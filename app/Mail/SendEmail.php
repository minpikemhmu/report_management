<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ccEmails;
    public $bccEmails;
    public $subject;
    public $alternativePart;
    public $attachments;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ccEmails, $bccEmails, $subject, $alternativePart, $attachments, $body)
    {
        $this->ccEmails = $ccEmails;
        $this->bccEmails = $bccEmails;
        $this->subject = $subject;
        $this->alternativePart = $alternativePart;
        $this->attachments = $attachments;
        $this->body = $body;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
            cc: $this->ccEmails,
            bcc: $this->bccEmails
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
            view: 'emails.send-email',
            with: [
                'body' => $this->body,
                'attachments' => $this->attachments,
            ]
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {

        // $attachmentArray = [];
        // if ($this->attachments && count($this->attachments) > 0) {
        //     $attachments = $this->attachments;

        //     foreach ($attachments as $attachment) {
        //         $attachmentArray[] = Attachment::fromStorage($attachment->getRealPath())->as($attachment->getClientOriginalName())->withMime($attachment->getClientMimeType());
        //     }
        // }

        // dd(
        //     $attachmentArray
        // );

        return [];
    }
}
