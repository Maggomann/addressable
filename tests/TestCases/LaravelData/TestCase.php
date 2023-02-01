<?php

namespace Maggomann\Addressable\Tests\TestCases\LaravelData;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Maggomann\Addressable\AddressableServiceProvider;
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
            AddressableServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadMigrationsFrom(__DIR__.'/../../../database/migrations');
    }
}
