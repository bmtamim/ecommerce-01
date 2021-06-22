<?php

namespace Database\Factories;

use App\Models\ShipCountry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipCountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShipCountry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'country_name' => 'Bangladesh',
        ];
    }
}
