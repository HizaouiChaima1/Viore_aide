<?php

namespace App\Builders;

use App\Models\Restaurant;

class RestaurantBuilder
{
    private array $attributes = [];

    public static function make(): self
    {
        return new self();
    }

    public function withCustomerName(string $customerName): self
    {
        $this->attributes['customerName'] = $customerName;
        return $this;
    }

    public function withRestaurantName(string $nomrestau): self
    {
        $this->attributes['nomrestau'] = $nomrestau;
        return $this;
    }

    public function withContact(string $customerContact): self
    {
        $this->attributes['customerContact'] = $customerContact;
        return $this;
    }

    public function withEmail(string $customerEmail): self
    {
        $this->attributes['customerEmail'] = $customerEmail;
        return $this;
    }

    public function withAddress(string $customerAddress1): self
    {
        $this->attributes['customerAddress1'] = $customerAddress1;
        return $this;
    }

    public function withCountry(string $pays): self
    {
        $this->attributes['pays'] = $pays;
        return $this;
    }

    public function withStatus(?string $status): self
    {
        if (!is_null($status)) {
            $this->attributes['status'] = $status;
        }

        return $this;
    }

    public function build(): Restaurant
    {
        return new Restaurant($this->attributes);
    }

    public function create(): Restaurant
    {
        $restaurant = $this->build();
        $restaurant->save();

        return $restaurant;
    }
}
