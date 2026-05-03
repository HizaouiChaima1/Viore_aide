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
use App\Services\Factories\ImageUploaderFactory;
use App\Services\Factories\ProductImageFactory;
use App\Services\Factories\ProfileImageFactory;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Strategy Pattern
        $this->app->bind(StatusStrategyInterface::class, ActiveInactiveStrategy::class);
        $this->app->bind(NotificationServiceInterface::class, EmailNotificationService::class);

        // Strategy — Contextual Binding selon le contrôleur
        $this->app->when(\App\Http\Controllers\EmaillController::class)
            ->needs(StatusStrategyInterface::class)
            ->give(\App\Services\Strategies\VerbalStatusStrategy::class);

        // GoF Factory Method — Contextual Binding
        // MenuService et CompteRestaurantController → ProductImageFactory (dossier uploads/)
        $this->app->when(\App\Services\MenuService::class)
            ->needs(ImageUploaderFactory::class)
            ->give(ProductImageFactory::class);

        $this->app->when(\App\Http\Controllers\CompteRestaurantController::class)
            ->needs(ImageUploaderFactory::class)
            ->give(ProductImageFactory::class);

        // DetailsController → ProfileImageFactory (dossier images/)
        $this->app->when(\App\Http\Controllers\DetailsController::class)
            ->needs(ImageUploaderFactory::class)
            ->give(ProfileImageFactory::class);

        // Singleton Pattern: AuthManager
        $this->app->singleton(AuthManager::class, function ($app) {
            return new AuthManager();
        });

        // Proxy Pattern: ProduitRepositoryProxy
        $this->app->bind(ProduitRepositoryInterface::class, function ($app) {
            return new ProduitRepositoryProxy(new ProduitRepository());
        });
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        commands::observe(CommandsObserver::class);
    }
}