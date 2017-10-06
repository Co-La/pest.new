<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $name = $this->message['name'];
        $email = $this->message['email'];
        $message = $this->message['message'];
        
        return $this->view(env('THEM').'.site.email.message')->with(['name' => $name, 'email' => $email, 'mess' => $message]);
    }
}
