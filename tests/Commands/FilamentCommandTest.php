
<?php

it('can publish the laravel addressable for filament data', function () {
    $this->artisan('laravel-addressable:install-filament')
        ->expectsOutput('Publishing laravel-addressable languages for filament...')
        ->expectsOutput('laravel-addressable was installed successfully.')
        ->assertExitCode(0);
});
