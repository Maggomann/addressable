<?php

namespace Maggomann\LaravelAddressable\Tests\TestCases\LaravelData;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Maggomann\LaravelAddressable\LaravelAddressableServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends BaseTestCase
{
    use LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelAddressableServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadMigrationsFrom(__DIR__.'/../../../database/migrations');
    }
}
