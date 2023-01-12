<?php

namespace Maggomann\LaravelAddressable\Database\Factories;

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
