<?php

namespace App\ECommerce\Static\Listeners;

use App\ECommerce\Static\Events\ContactUsDataChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UpdateContactUsView
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
    public function handle(ContactUsDataChanged $eventData): void
    {
        Log::info($eventData);
        // Update cache data.
        Cache::set('contact-us-data', $eventData);
    }
}
