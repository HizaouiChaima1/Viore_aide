<?php

namespace App\Services;

use App\Builders\RestaurantBuilder;
use App\Models\Restaurant;
use App\Models\User;
use App\Notifications\Allcustomers;

/**
 * GoF Structural Pattern: Facade
 *
 * Fournit une interface simple pour l'inscription d'un restaurant
 * en cachant la construction, la persistance et les notifications.
 */
class RestaurantRegistrationFacade
{
    public function register(array $validatedData): Restaurant
    {
        $restaurant = RestaurantBuilder::make()
            ->withCustomerName($validatedData['customerName'])
            ->withRestaurantName($validatedData['nomrestau'])
            ->withContact($validatedData['customerContact'])
            ->withEmail($validatedData['customerEmail'])
            ->withAddress($validatedData['customerAddress1'])
            ->withCountry($validatedData['pays'])
            ->withStatus($validatedData['status'] ?? null)
            ->create();

        $this->notifyAllUsers($restaurant);

        return $restaurant;
    }

    public function registerWithoutNotification(array $validatedData): Restaurant
    {
        return RestaurantBuilder::make()
            ->withCustomerName($validatedData['customerName'])
            ->withRestaurantName($validatedData['nomrestau'])
            ->withContact($validatedData['customerContact'])
            ->withEmail($validatedData['customerEmail'])
            ->withAddress($validatedData['customerAddress1'])
            ->withCountry($validatedData['pays'])
            ->withStatus($validatedData['status'] ?? null)
            ->create();
    }

    private function notifyAllUsers(Restaurant $restaurant): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new Allcustomers($restaurant));
        }
    }
}
