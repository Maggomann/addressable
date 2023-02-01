<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maggomann\Addressable\Models\AddressCategory;

class AddressCategoryTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            [
                'title_translation_key' => 'address_categories.title.standard',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_translation_key' => 'address_categories.title.billing',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title_translation_key' => 'address_categories.title.shipping',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        AddressCategory::insert($categories);
    }
}
