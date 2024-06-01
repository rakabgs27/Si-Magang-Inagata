<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrantWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $registrant;
    public $managerPhoneNumber;

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
        return $this->subject('Thank You for Registering')
                    ->view('emails.registrant_thank_you');
    }
}
