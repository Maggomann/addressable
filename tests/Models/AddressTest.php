<?php

use Maggomann\LaravelAddressable\Models\Address;
use Maggomann\LaravelAddressable\Tests\Database\Factories\AddressFactory;
use Maggomann\LaravelAddressable\Tests\Database\Factories\UserFactory;
use Maggomann\LaravelAddressable\Tests\TestClasses\User;

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
                ])
                );
        }
    );
});
