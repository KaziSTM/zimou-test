<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->lexify('STORE????'),
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phones' => $this->faker->phoneNumber,
            'company_name' => $this->faker->company,
            'capital' => $this->faker->numberBetween(10000, 50000),
            'address' => $this->faker->address,
            'register_commerce_number' => $this->faker->unique()->numerify('RC#######'),
            'nif' => $this->faker->unique()->numerify('NIF#######'),
            'legal_form' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->numberBetween(1, 3),
            'can_update_preparing_packages' => $this->faker->boolean,
        ];
    }
}
