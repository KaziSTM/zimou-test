<?php

namespace Database\Seeders;

use App\Enums\DeliveryTypeEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('delivery_types')->insert(DeliveryTypeEnum::prepareValues());
    }


}
