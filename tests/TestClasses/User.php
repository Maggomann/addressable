<?php

namespace Maggomann\Addressable\Tests\TestClasses;

use Illuminate\Foundation\Auth\User as BaseUser;
use Maggomann\Addressable\Traits\Addressable;

class User extends BaseUser
{
    use Addressable;
}
