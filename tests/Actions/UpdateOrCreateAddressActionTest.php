<?php

use Maggomann\LaravelAddressable\Actions\UpdateOrCreateAddressAction;
use Maggomann\LaravelAddressable\DTO\AddressData;
use Maggomann\LaravelAddressable\Models\Address;
use Maggomann\LaravelAddressable\Tests\Database\Factories\AddressFactory;
use Maggomann\LaravelAddressable\Tests\Database\Factories\UserFactory;

dataset('UpdateOrCreateAddresses', function () {
    yield fn () => AddressData::from([
        'gender_id' => 1,
        'category_id' => 1,
        'first_name' => 'first_name example',
        'last_name' => 'last_name name example',
        'name' => 'name example',
        'street_address' => 'street_address example',
        'street_addition' => 'street_addition example',
        'postal_code' => 'postal_code example',
        'city' => 'city example',
        'country_code' => 'DE',
        'is_preferred' => false,
        'is_main' => false,
    ]);

    yield fn () => AddressData::from([
        'gender_id' => 1,
        'category_id' => 1,
        'first_name' => 'first_name example 2',
        'last_name' => 'last_name name example 2',
        'name' => 'name example 2',
        'street_address' => 'street_address example 2',
        'street_addition' => 'street_addition example 2',
        'postal_code' => 'postal_code example 2',
        'city' => 'city example 2',
        'country_code' => 'DE',
        'is_preferred' => true,
        'is_main' => true,
    ]);
});

it('creates an address', function (AddressData $ddressData) {
    $user = UserFactory::new()->create();

    $address = app(UpdateOrCreateAddressAction::class)->execute($user, $ddressData);

    $this->assertDatabaseHas(
        Address::class,
        collect($ddressData->toArray())
            ->merge([
                'id' => $address->id,
                'addressable_id' => $user->id,
                'addressable_type' => $user->getMorphClass(),
            ])
            ->toArray()
    );
})->with('UpdateOrCreateAddresses');

it('updates an address', function (AddressData $ddressData) {
    $address = AddressFactory::new()->create();

    $address = app(UpdateOrCreateAddressAction::class)->execute($address->addressable, $ddressData, $address);

    $this->assertDatabaseHas(Address::class, $ddressData->toArray());
})->with('UpdateOrCreateAddresses');
