<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegistrantNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $registrant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registrant)
    {
        $this->registrant = $registrant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Registrant Notification')
                    ->view('emails.newRegistration');
    }
}
