<?php

namespace Maggomann\LaravelAddressable;

use Maggomann\LaravelAddressable\Commands\LaravelAddressableCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAddressableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-addressable')
            ->hasConfigFile()
            ->hasMigration('create_addressable_tables')
            ->hasCommand(LaravelAddressableCommand::class)
            ->hasTranslations();
    }
}
