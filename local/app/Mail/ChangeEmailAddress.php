<?php

namespace Responsive\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeEmailAddress extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The verification url
     *
     * @var string
     */
    public $url;

    /**
     * Create a new message instance.
     *
     * @param $url
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.auth.change_email');
    }
}
