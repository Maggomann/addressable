<?php

namespace Maggomann\LaravelAddressable;

use Maggomann\LaravelAddressable\Commands\LaravelAddressableCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAddressableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-addressable')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-addressable_table')
            ->hasCommand(LaravelAddressableCommand::class);
    }
}
