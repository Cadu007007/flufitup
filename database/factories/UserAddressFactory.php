<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'address_type' => $this->faker->randomElement(['pickup', 'drop']),
            'building_type' => $this->faker->randomElement(['residential', 'business']),
            'residential_type' => $this->faker->randomElement(['apartment', 'house']),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->randomLetter,
            'unit_number' => $this->faker->randomNumber(),
            'building_name' => $this->faker->name(),
            'gate_code' => $this->faker->randomNumber(),
        ];
    }
}
