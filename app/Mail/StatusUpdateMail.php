<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pendaftar;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pendaftar, $status)
    {
        $this->pendaftar = $pendaftar;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.statusUpdate')
            ->subject('Status Update')
            ->with([
                'name' => $this->pendaftar->user->name,
                'status' => $this->status,
                'email' => $this->pendaftar->user->email,
                'password' => $this->pendaftar->nim . $this->pendaftar->user->id,
            ]);
    }
}
