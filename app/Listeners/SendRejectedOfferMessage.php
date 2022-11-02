<?php

namespace App\Listeners;

use App\Events\RejectedOfferEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRejectedOfferMessage
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
     * @param  \App\Events\RejectedOfferEvent  $event
     * @return void
     */
    public function handle(RejectedOfferEvent $event)
    {
        //
    }
}
