<?php

namespace App\ECommerce\Client\Listeners;

use App\ECommerce\Client\Emails\NewAccountEmail;
use App\ECommerce\Client\Events\AccountCreatedEvent;
use App\ECommerce\Client\Models\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AccountCreatedEvent $event): void
    {
        Mail::to($event->client->email)->send(new NewAccountEmail($event->client));
    }
}
