<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegistrantNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $input;
    public $signedUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $signedUrl)
    {
        $this->input = $input;
        $this->signedUrl = $signedUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Registrant Notification')
            ->view('emails.newRegistration')
            ->with(['input' => $this->input, 'signedUrl' => $this->signedUrl]);
    }
}
