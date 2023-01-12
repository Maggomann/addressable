<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LaravelAddressableProductionTableSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AddressGenderTableSeeder::class,
            AddressCategoryTableSeeder::class,
        ]);
    }
}
