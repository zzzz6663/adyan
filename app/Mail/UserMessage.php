<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $payam;
    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$title)
    {
       $this->payam = $message;
       $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $payam=$this->payam;
        $title=$this->title;
        return $this->view('email.message' ,compact(['payam','title']))->subject(__('sentences.message'));
    }
}
