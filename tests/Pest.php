<?php

use Maggomann\LaravelAddressable\Tests\TestCase;

// use Illuminate\Database\Eloquent\Model;

// expect()->extend('toBeSameModel', function (Model $model) {
//     return $this
//         ->is($model)->toBeTrue();
// });

uses(TestCase::class)->in(
    __DIR__.'/Commands',
);
