<?php

namespace Maggomann\LaravelAddressable\Tests\TestClasses;

use Illuminate\Foundation\Auth\User as BaseUser;
use Maggomann\LaravelAddressable\Traits\Addressable;

class User extends BaseUser
{
    use Addressable;
}
