<?php

use Illuminate\Support\Arr;
use Maggomann\LaravelAddressable\DTO\AddressData;

beforeEach(function () {
    $this->validParams = [
        'gender_id' => 1,
        'category_id' => 1,
        'first_name' => 'first_name example',
        'last_name' => 'last_name name example',
        'name' => 'name example',
        'street_address' => 'street_address example',
        'street_addition' => 'street_addition example',
        'postal_code' => 'postal_code example',
        'city' => 'city example',
        'country_code' => 'DE',
        'state' => null,
        'company' => null,
        'job_title' => null,
        'latitude' => null,
        'longitude' => null,
        'is_preferred' => false,
        'is_main' => false,
    ];
});

it('returns a AddressData when valid data is submitted', function () {
    $data = AddressData::from($this->validParams);

    $this->assertInstanceOf(AddressData::class, $data);
    $this->assertInstanceOf(AddressData::class, $data);
});

test('AddressData throws an error when invalid data is submitted', function ($key, $value) {
    $this->expectException(TypeError::class);

    AddressData::from(
        Arr::set($this->validParams, $key, $value)
    );
})->with([
    ['gender_id', 'invalid'],
    ['category_id', 'invalid'],
    ['first_name', []],
    ['last_name', [null]],
    ['name', []],
    ['street_address', null],
    ['street_addition', []],
    ['postal_code', []],
    ['city', null],
    ['country_code', null],
    ['state', []],
    ['company', []],
    ['job_title', []],
    ['latitude', []],
    ['longitude', []],
    ['is_preferred', null],
    ['is_main', null],
]);
