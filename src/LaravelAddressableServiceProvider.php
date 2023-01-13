<?php

namespace Maggomann\LaravelAddressable;

use Maggomann\LaravelAddressable\Commands\FilamentCommand;
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
            ->hasCommands([
                FilamentCommand::class,
                LaravelAddressableCommand::class,
            ])
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        if ($this->package->hasTranslations) {
            $this->publishes([
                $this->package->basePath('/../resources/lang') => resource_path('lang/'),
            ], "{$this->package->shortName()}-filament-translations");
        }
    }
}
