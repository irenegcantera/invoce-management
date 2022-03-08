<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The subject of the message.
     *
     * @var string
     */
    public $subject = "Recuperación de contraseñas";

     /**
     * The view data for the message.
     *
     * @var array
     */
    public $viewData = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.remember_token');
    }
}
