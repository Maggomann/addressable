<?php

namespace Maggomann\Addressable;

use Maggomann\Addressable\Commands\FilamentCommand;
use Maggomann\Addressable\Commands\AddressableCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AddressableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('addressable')
            ->hasConfigFile()
            ->hasMigration('create_addressable_tables')
            ->hasCommands([
                FilamentCommand::class,
                AddressableCommand::class,
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
