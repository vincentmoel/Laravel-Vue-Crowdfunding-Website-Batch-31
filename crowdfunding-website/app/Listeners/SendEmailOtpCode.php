<?php

namespace App\Listeners;

use App\Mail\OtpCodeMail;
use App\Events\OtpCodeEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailOtpCode implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OtpCode  $event
     * @return void
     */
    public function handle(OtpCodeEvent $event)
    {
        if($event->condition == 'register')
        {
            $message = "Register berhasil";
        }
        else if ($event->condition == 'regenerate')
        {
            $message = "Regenerate berhasil";
        }
        Mail::to($event->user)->send(new OtpCodeMail($event->user , $message));
    }
}
