<?php

namespace App\Mail;

use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $message)
    {
        $this->user     = $user;
        $this->message  = $message;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vincent@gmail.com')
                    ->view('otp_code_mail',[
                        'user'      => $this->user,
                        'messages'  => $this->message
                    ]);
    }
}
