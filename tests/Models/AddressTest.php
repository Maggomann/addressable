<?php

use Maggomann\Addressable\Models\Address;
use Maggomann\Addressable\Models\AddressCategory;
use Maggomann\Addressable\Models\AddressGender;
use Maggomann\Addressable\Tests\Database\Factories\AddressFactory;
use Maggomann\Addressable\Tests\Database\Factories\UserFactory;
use Maggomann\Addressable\Tests\TestClasses\User;

it('can save an address', function () {
    $address = new Address();
    $address->fill([
        'gender_id' => 1,
        'category_id' => 1,
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ]);

    $user = UserFactory::new()->create();
    $user->address()->save($address);

    tap(
        $address->refresh(),
        function (Address $address) use ($user) {
            $this->assertInstanceOf(User::class, $address->addressable);
            $this->assertSame($user->id, $address->addressable->id);
            $this->assertCount(1, $user->addresses);

            $this->assertDatabaseHas(Address::class, [
                'id' => $address->id,
                'addressable_id' => $user->id,
                'addressable_type' => User::class,
            ]);
        }
    );
});

it('can save an addresses', function () {
    $user = UserFactory::new()->create();
    $user->addresses()->saveMany(
        AddressFactory::new()
            ->times(2)
            ->create()
    );
    $user->save();

    tap(
        $user->refresh(),
        function (User $user) {
            $this->assertCount(2, $user->addresses);

            $user
                ->addresses
                ->each(fn (Address $address) => $this->assertDatabaseHas(Address::class, [
                    'id' => $address->id,
                    'addressable_id' => $user->id,
                    'addressable_type' => User::class,
                ]));
        }
    );
});

it('saves the correct salutation based on the class', function ($genderId) {
    $addressGender = AddressGender::query()->find($genderId);

    $address = new Address();
    $address->fill([
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ]);
    $address->withGender($addressGender);

    $user = UserFactory::new()->create();
    $user->address()->save($address);

    tap(
        $user->refresh(),
        function (User $user) use ($genderId) {
            $this->assertCount(1, $user->addresses);

            $this->assertDatabaseHas(Address::class, [
                'id' => $user->address->id,
                'addressable_id' => $user->id,
                'addressable_type' => User::class,
                'gender_id' => $genderId,
            ]);
        }
    );
})->with([
    [1],
    [2],
    [3],
]);

it('saves the correct salutation based on the integer', function ($genderId) {
    $address = new Address();
    $address->fill([
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ]);
    $address->withGender($genderId);

    $user = UserFactory::new()->create();
    $user->address()->save($address);

    tap(
        $user->refresh(),
        function (User $user) use ($genderId) {
            $this->assertCount(1, $user->addresses);

            $this->assertDatabaseHas(Address::class, [
                'id' => $user->address->id,
                'addressable_id' => $user->id,
                'addressable_type' => User::class,
                'gender_id' => $genderId,
            ]);
        }
    );
})->with([
    [1],
    [2],
    [3],
]);

it('saves the correct category based on the class', function ($categoryId) {
    $addressCategory = AddressCategory::query()->find($categoryId);

    $address = new Address();
    $address->fill([
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ]);
    $address->withCategory($addressCategory);

    $user = UserFactory::new()->create();
    $user->address()->save($address);

    tap(
        $user->refresh(),
        function (User $user) use ($categoryId) {
            $this->assertCount(1, $user->addresses);

            $this->assertDatabaseHas(Address::class, [
                'id' => $user->address->id,
                'addressable_id' => $user->id,
                'addressable_type' => User::class,
                'category_id' => $categoryId,
            ]);
        }
    );
})->with([
    [1],
    [2],
    [3],
]);

it('saves the correct category based on the integer', function ($categoryId) {
    $address = new Address();
    $address->fill([
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ]);
    $address->withCategory($categoryId);

    $user = UserFactory::new()->create();
    $user->address()->save($address);

    tap(
        $user->refresh(),
        function (User $user) use ($categoryId) {
            $this->assertCount(1, $user->addresses);

            $this->assertDatabaseHas(Address::class, [
                'id' => $user->address->id,
                'addressable_id' => $user->id,
                'addressable_type' => User::class,
                'category_id' => $categoryId,
            ]);
        }
    );
})->with([
    [1],
    [2],
    [3],
]);

it('can save address as collection', function () {
    $addressAttributes = [
        'first_name' => 'first name',
        'last_name' => 'last name',
        'name' => 'name',
        'street_address' => 'street address',
        'street_addition' => 'street addition',
        'postal_code' => 'postal code',
        'city' => 'city',
        'country_code' => 'de',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'is_preferred' => true,
        'is_main' => true,
    ];
    $addressOne = new Address();
    $addressOne->fill($addressAttributes);
    $addressTwo = new Address();
    $addressTwo->fill($addressAttributes);

    $user = UserFactory::new()->create();
    $user->addresses()->saveMany(
        collect([
            $addressOne,
            $addressTwo,
        ])
    );

    tap($user->refresh(), fn (User $user) => $this->assertCount(2, $user->addresses));
});
