<?php

namespace App\Listeners;

use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\Mail;
use App\Events\SendWelcomeEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $tries = 3;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendWelcomeEmailEvent  $event
     * @return void
     */
    public function handle(SendWelcomeEmailEvent $event)
    {
        Mail::to('inbox@example.com')->send(new WelcomeUserMail($event->user));
    }
}
