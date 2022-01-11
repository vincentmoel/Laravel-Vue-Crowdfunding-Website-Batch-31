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
        Mail::to($event->user)->send(new OtpCodeMail($event->user,$event->otp_code));
    }
}
