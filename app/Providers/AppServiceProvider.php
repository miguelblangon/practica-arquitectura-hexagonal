<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\Ports\NotificationServiceInterface;
use App\Infrastructure\Adapters\EmailNotificationAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NotificationServiceInterface::class, EmailNotificationAdapter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
