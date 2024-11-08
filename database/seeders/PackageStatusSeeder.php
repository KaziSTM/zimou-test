<?php

namespace Database\Seeders;

use App\Enums\StatusesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package_statuses')->insert(StatusesEnum::prepareValues());
    }


}
