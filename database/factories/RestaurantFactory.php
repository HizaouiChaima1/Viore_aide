<?php
namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;

    public function definition()
    {
        return [
            'nomrestau' => $this->faker->company,
            'created_at' => $this->faker->dateTimeBetween('-2 months', 'now')
        ];
    }
}
