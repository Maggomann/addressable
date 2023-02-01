<?php

namespace Maggomann\Addressable\Tests;

use Maggomann\Addressable\AddressableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            AddressableServiceProvider::class,
        ];
    }
}
