<?php

use Maggomann\Addressable\Models\AddressCategory;

it('has the default category entries', function ($translationKey) {
    $this->assertDatabaseHas(AddressCategory::class, [
        'title_translation_key' => $translationKey,
    ]);
})->with([
    ['address_categories.title.standard'],
    ['address_categories.title.billing'],
    ['address_categories.title.shipping'],
]);
