<?php

namespace Maggomann\LaravelAddressable\Database\Factories;

use Illuminate\Database\Seeder;
use Maggomann\LaravelAddressable\Models\AddressGender;

class AddressGenderTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $genders = [
            [
                'title_translation_key' => 'address_genders.title.male',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_translation_key' => 'address_genders.title.female',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_translation_key' => 'address_genders.title.diverse',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        AddressGender::insert($genders);
    }
}
