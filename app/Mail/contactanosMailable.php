<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactanosMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject="Información de contacto";
    public $infoContactactanos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infoContactanos)
    {
        //
        $this->infoContactactanos=$infoContactanos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactanos');
    }
}
