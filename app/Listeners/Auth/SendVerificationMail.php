<?php

namespace Responsive\Listeners\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Responsive\Notifications\Auth\UserVerification as UserVerificationNotification;

class SendVerificationMail
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
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // generate verification token
        $token = $event->user->generateToken();

        // notify user by sending mail verification
        $event->user->notify(new UserVerificationNotification($token));
    }
}
