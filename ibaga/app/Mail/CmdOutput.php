<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CmdOutput extends Mailable
{
    use Queueable, SerializesModels;
    public $output;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($output)
    {
        $this->output = $output;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cmdout', ['output' => $this->output]);
    }
}
