
<?php

it('can publish the laravel addressable data', function () {
    $this->artisan('addressable:install')
        ->expectsOutput('Publishing addressable Configuration...')
        ->expectsOutput('Publishing addressable languages...')
        ->expectsOutput('Publishing addressable Migrations...')
        ->expectsOutput('addressable was installed successfully.')
        ->assertExitCode(0);
});
