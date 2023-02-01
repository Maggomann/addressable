
<?php

it('can publish the laravel addressable for filament data', function () {
    $this->artisan('addressable:install-filament')
        ->expectsOutput('Publishing addressable languages for filament...')
        ->expectsOutput('addressable was installed successfully.')
        ->assertExitCode(0);
});
