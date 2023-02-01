<?php

namespace Maggomann\Addressable\Commands;

use Illuminate\Console\Command;

class FilamentCommand extends Command
{
    public $signature = 'addressable:install-filament';

    protected $description = 'Install all of the addressable resources';

    public function handle(): int
    {
        $this->comment('Publishing addressable languages for filament...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-filament-translations']);

        $this->info('addressable was installed successfully.');

        return self::SUCCESS;
    }
}
