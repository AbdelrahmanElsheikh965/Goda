<?php

namespace App\Providers;

use App\ECommerce\Shared\Helpers\SharedData;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
     //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        # You must comment this line just to migrate for the first time.
        SharedData::getInstance()->HandleAllSharedData();
    }
}
