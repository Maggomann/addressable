<?php

namespace Maggomann\LaravelAddressable\Commands;

use Illuminate\Console\Command;

class LaravelAddressableCommand extends Command
{
    public $signature = 'laravel-addressable:install';

    protected $description = 'Install all of the laravel-addressable resources';

    public function handle(): int
    {
        $this->comment('Publishing laravel-addressable Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-config']);

        $this->comment('Publishing laravel-addressable languages...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-translations']);

        $this->comment('Publishing laravel-addressable Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-migrations']);

        $this->info('laravel-addressable was installed successfully.');

        return self::SUCCESS;
    }
}
