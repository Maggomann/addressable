<?php

use Maggomann\LaravelAddressable\Models\AddressGender;

it('has the default gender entries', function ($translationKey) {
    $this->assertDatabaseHas(AddressGender::class, [
        'title_translation_key' => $translationKey,
    ]);
})->with([
    ['address_genders.title.male'],
    ['address_genders.title.female'],
    ['address_genders.title.diverse'],
]);
