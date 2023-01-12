
<?php

it('can publish the laravel addressable data', function () {
    $this->artisan('laravel-addressable:install')
        ->expectsOutput('Publishing laravel-addressable Configuration...')
        ->expectsOutput('Publishing laravel-addressable languages...')
        ->expectsOutput('Publishing laravel-addressable Migrations...')
        ->expectsOutput('laravel-addressable was installed successfully.')
        ->assertExitCode(0);
});
