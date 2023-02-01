<?php

namespace Maggomann\Addressable\Commands;

use Illuminate\Console\Command;

class AddressableCommand extends Command
{
    public $signature = 'addressable:install';

    protected $description = 'Install all of the addressable resources';

    public function handle(): int
    {
        $this->comment('Publishing addressable Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-config']);

        $this->comment('Publishing addressable languages...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-translations']);

        $this->comment('Publishing addressable Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'addressable-migrations']);

        $this->info('addressable was installed successfully.');

        return self::SUCCESS;
    }
}
