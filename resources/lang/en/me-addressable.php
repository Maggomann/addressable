<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tables
    |--------------------------------------------------------------------------
    */
    'address_genders' => [
        'title' => [
            'male' => 'Mr.',
            'female' => 'Ms.',
            'diverse' => 'Various',
        ],
    ],

    'address_categories' => [
        'title' => [
            'standard' => 'Default address',
            'billing' => 'Billing addres',
            'shipping' => 'Delivery address',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */
    'models' => [
        'address_gender' => 'salutation|addresses',
        'addresses' => 'address|addresses',
    ],

    /*
    |--------------------------------------------------------------------------
    | Attribute
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'addresses' => [
            'category_id' => 'address type',
            'gender_id' => 'salutation',
            'first_name' => 'first name',
            'last_name' => 'last name',
            'name' => 'first_name', 'last_name' => 'last_name',
            'street_address' => 'streets and no.',
            'street_addition' => 'street addition',
            'postal_code' => 'postal code',
            'city' => 'city',
            'country_code' => 'country',
            'state' => 'federal state',
            'company' => 'company',
            'job_title' => 'job title',
            'is_preferred' => 'prefer',
            'is_main' => 'is main address',
            'latitude' => 'latitude',
            'longitude' => 'longitude',
        ],
    ],
];
