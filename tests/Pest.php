<?php

use Maggomann\LaravelAddressable\Tests\TestCase;
use Maggomann\LaravelAddressable\Tests\TestCases\DB\TestCase as DBTestCase;
use Maggomann\LaravelAddressable\Tests\TestCases\LaravelData\TestCase as LaravelDataTestCase;

uses(TestCase::class)->in(
    __DIR__.'/Commands',
);

uses(LaravelDataTestCase::class)->in(
    __DIR__.'/Actions',
    __DIR__.'/DTO',
);

uses(DBTestCase::class)->in(
    __DIR__.'/Traits',
    __DIR__.'/Models',
);
