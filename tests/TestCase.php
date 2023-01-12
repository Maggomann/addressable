<?php

namespace Maggomann\LaravelAddressable\Tests;

use Maggomann\LaravelAddressable\LaravelAddressableServiceProvider;
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
            LaravelAddressableServiceProvider::class,
        ];
    }
}
