<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'tracking_code' => $this->faker->unique()->numerify('TRACK####'),
            'commune_id' => $this->faker->numberBetween(1, 100),
            'delivery_type_id' => $this->faker->numberBetween(1, 3),
            'status_id' => $this->faker->numberBetween(1, 5),
            'store_id' => null,
            'address' => $this->faker->address,
            'can_be_opened' => $this->faker->boolean,
            'name' => $this->faker->word,
            'client_first_name' => $this->faker->firstName,
            'client_last_name' => $this->faker->lastName,
            'client_phone' => $this->faker->phoneNumber,
            'client_phone2' => $this->faker->optional()->phoneNumber,
            'cod_to_pay' => $this->faker->randomFloat(2, 0, 5000),
            'commission' => $this->faker->randomFloat(2, 0, 200),
            'status_updated_at' => $this->faker->dateTime,
            'delivered_at' => $this->faker->optional()->dateTime,
            'delivery_price' => $this->faker->randomFloat(2, 100, 500),
            'extra_weight_price' => $this->faker->numberBetween(0, 50),
            'free_delivery' => $this->faker->boolean,
            'packaging_price' => $this->faker->numberBetween(0, 100),
            'partner_cod_price' => $this->faker->randomFloat(2, 0, 300),
            'partner_delivery_price' => $this->faker->numberBetween(0, 100),
            'partner_return' => $this->faker->randomFloat(2, 0, 200),
            'price' => $this->faker->randomFloat(2, 100, 2000),
            'price_to_pay' => $this->faker->randomFloat(2, 50, 1500),
            'return_price' => $this->faker->numberBetween(0, 100),
            'total_price' => $this->faker->randomFloat(2, 100, 3000),
            'weight' => $this->faker->numberBetween(500, 5000),
        ];
    }
}
