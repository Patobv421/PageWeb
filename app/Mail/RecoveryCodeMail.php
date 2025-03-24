<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    /**
     * Recibimos el código en el constructor
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Construimos el correo
     */
    public function build()
    {
        return $this->subject('Your Recovery Code')
                    ->view('Emails.recovery_code');
    }
    
    
}

