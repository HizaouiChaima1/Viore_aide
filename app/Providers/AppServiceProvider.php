<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Contracts\StatusStrategyInterface;
use App\Services\Strategies\ActiveInactiveStrategy;
use App\Contracts\NotificationServiceInterface;
use App\Services\EmailNotificationService;
use App\Models\commands;
use App\Observers\CommandsObserver;

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

        // SOLID: Contextual Binding
        // On définit quelle stratégie utiliser selon le contrôleur
        $this->app->when(\App\Http\Controllers\EmaillController::class)
                  ->needs(StatusStrategyInterface::class)
                  ->give(\App\Services\Strategies\VerbalStatusStrategy::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        commands::observe(CommandsObserver::class);
    }
}
