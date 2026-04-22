<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Contracts\StatusStrategyInterface;
use App\Services\Strategies\ActiveInactiveStrategy;
use App\Contracts\NotificationServiceInterface;
use App\Services\EmailNotificationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StatusStrategyInterface::class, ActiveInactiveStrategy::class);
        $this->app->bind(NotificationServiceInterface::class, EmailNotificationService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
