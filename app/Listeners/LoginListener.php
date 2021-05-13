<?php

namespace App\Listeners;

use App\Mail\NewAccess;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LoginListener
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
     * @param object $event
     * @return void
     */
    public function handle(Login $event)
    {
        Mail::to($event->user)
            ->queue(new NewAccess($event->user));
        info('User ' . $event->user->name . ' is login!');
    }
}

