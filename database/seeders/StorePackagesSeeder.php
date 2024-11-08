<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\DeliveryType;
use App\Models\Package;
use App\Models\PackageStatus;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StorePackagesSeeder extends Seeder
{
    public function run(): void
    {
        $deliveryTypeIds = DeliveryType::pluck('id')->all();
        $statusIds = PackageStatus::pluck('id')->all();
        $communeIds = Commune::pluck('id')->all();

        Store::factory(5000)->create()->each(function ($store) use ($deliveryTypeIds, $statusIds, $communeIds) {
            $this->createPackagesForStore($store->id, $deliveryTypeIds, $statusIds, $communeIds);
        });
    }

    /**
     * Creates and inserts packages for a given store in a single batch.
     *
     * @param  int  $storeId
     * @param  array  $deliveryTypeIds
     * @param  array  $statusIds
     * @param  array  $communeIds
     * @return void
     */
    protected function createPackagesForStore(
        int $storeId,
        array $deliveryTypeIds,
        array $statusIds,
        array $communeIds
    ): void {
        $packages = $this->generatePackageData($storeId, $deliveryTypeIds, $statusIds, $communeIds);

        Package::insert($packages);
    }

    /**
     * Generates an array of package data for a single store.
     *
     * @param  int  $storeId
     * @param  array  $deliveryTypeIds
     * @param  array  $statusIds
     * @param  array  $communeIds
     * @return array
     */
    protected function generatePackageData(
        int $storeId,
        array $deliveryTypeIds,
        array $statusIds,
        array $communeIds
    ): array {
        $packages = [];

        for ($i = 0; $i < 100; $i++) {
            $packages[] = [
                'store_id' => $storeId,
                'delivery_type_id' => $this->randomElement($deliveryTypeIds),
                'status_id' => $this->randomElement($statusIds),
                'commune_id' => $this->randomElement($communeIds),
                'uuid' => (string) Str::uuid(),
                'tracking_code' => Str::random(10),
                'address' => fake()->address(),
                'can_be_opened' => fake()->boolean(),
                'name' => fake()->name(),
                'client_first_name' => fake()->firstName(),
                'client_last_name' => fake()->lastName(),
                'client_phone' => fake()->phoneNumber(),
                'client_phone2' => fake()->optional()->phoneNumber(),
                'cod_to_pay' => fake()->randomFloat(2, 0, 500),
                'commission' => fake()->randomFloat(2, 0, 50),
                'status_updated_at' => now(),
                'delivered_at' => fake()->optional()->dateTime(),
                'delivery_price' => fake()->randomFloat(2, 5, 50),
                'extra_weight_price' => fake()->numberBetween(0, 20),
                'free_delivery' => fake()->boolean(),
                'packaging_price' => fake()->numberBetween(0, 20),
                'partner_cod_price' => fake()->randomFloat(2, 0, 50),
                'partner_delivery_price' => fake()->numberBetween(0, 100),
                'partner_return' => fake()->randomFloat(2, 0, 50),
                'price' => fake()->randomFloat(2, 50, 500),
                'price_to_pay' => fake()->randomFloat(2, 10, 100),
                'return_price' => fake()->numberBetween(0, 50),
                'total_price' => fake()->randomFloat(2, 100, 1000),
                'weight' => fake()->numberBetween(500, 2000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $packages;
    }

    /**
     * Helper function to fetch a random element from an array.
     *
     * @param  array  $array
     * @return mixed
     */
    protected function randomElement(array $array): mixed
    {
        return $array[array_rand($array)];
    }
}
