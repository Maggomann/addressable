<?php

use Maggomann\LaravelAddressable\Tests\TestCase;
use Maggomann\LaravelAddressable\Tests\TestCases\DB\TestCase as DBTestCase;

uses(TestCase::class)->in(
    __DIR__.'/Commands',
);

uses(DBTestCase::class)->in(
    __DIR__.'/Traits',
);
