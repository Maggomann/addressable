<?php

namespace Maggomann\LaravelAddressable\Commands;

use Illuminate\Console\Command;

class FilamentCommand extends Command
{
    public $signature = 'laravel-addressable:install-filament';

    protected $description = 'Install all of the laravel-addressable resources';

    public function handle(): int
    {
        $this->comment('Publishing laravel-addressable languages for filament...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-filament-translations']);

        $this->info('laravel-addressable was installed successfully.');

        return self::SUCCESS;
    }
}
