<?php

// config for Maggomann/LaravelAddressable
return [

    /*
    |--------------------------------------------------------------------------
    | Tables
    |--------------------------------------------------------------------------
    */
    'address_genders' => [
        'title' => [
            'male' => 'Herr',
            'female' => 'Frau',
            'diverse' => 'Diverse',
        ],
    ],

    'address_categories' => [
        'title' => [
            'standard' => 'Standardadresse',
            'billing' => 'Rechnungsadresse',
            'shipping' => 'Lieferadresse',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */
    'models' => [
        'address_gender' => 'Anrede|Anreden',
        'addresses' => 'Adresse|Adressen',
    ],

    /*
    |--------------------------------------------------------------------------
    | Attribute
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'addresses' => [
            'category_id' => 'Adressentyp',
            'gender_id' => 'Anrede',
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'name' => 'Vor- und Nachname',
            'street_address' => 'Straßen und Nr.',
            'street_addition' => 'Straßenzusatz',
            'postal_code' => 'Postleitzahl',
            'city' => 'Stadt',
            'street_addition' => 'Straßenzusatz',
            'country_code' => 'Land',
            'state' => 'Bundeland',
            'company' => 'Firma',
            'job_title' => 'Berufsbezeichnung',
            'is_preferred' => 'bevorzugen',
            'is_main' => 'Hauptadresse',
            'latitude' => 'Breitengrad',
            'longitude' => 'Längengrad',
        ],
    ],
];
