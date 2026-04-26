<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Contracts\StatusStrategyInterface;
use App\Services\Strategies\ActiveInactiveStrategy;
use App\Contracts\NotificationServiceInterface;
use App\Services\EmailNotificationService;
use App\Services\AuthManager;
use App\Models\commands;
use App\Observers\CommandsObserver;
use App\Repositories\ProduitRepositoryInterface;
use App\Repositories\ProduitRepository;
use App\Repositories\ProduitRepositoryProxy;

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

        // Singleton Pattern: AuthManager
        // Une seule instance par requête HTTP — centralize rôles et permissions
        $this->app->singleton(AuthManager::class, function ($app) {
            return new AuthManager();
        });

        // Proxy Pattern: ProduitRepositoryProxy
        // Le contrôleur reçoit le Proxy à la place du vrai repository.
        // Le Proxy mémorise les résultats pour éviter les requêtes SQL répétées.
        $this->app->bind(ProduitRepositoryInterface::class, function ($app) {
            return new ProduitRepositoryProxy(new ProduitRepository());
        });
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
