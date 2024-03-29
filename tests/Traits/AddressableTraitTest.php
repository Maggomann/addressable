<?php

use Maggomann\Addressable\Tests\Database\Factories\UserFactory;

it('return an enpty adresses collection when eloquent has no addresses', function () {
    $user = UserFactory::new()->create();

    $this->assertEmpty($user->addresses);
});

it('return an enpty adress collection when eloquent has no address', function () {
    $user = UserFactory::new()->create();

    $this->assertEmpty($user->address);
});
