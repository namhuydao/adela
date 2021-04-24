<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @param $email
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kích hoạt tài khoản của bạn')
                    ->markdown('backend.mail.verifyEmail');
    }
}
