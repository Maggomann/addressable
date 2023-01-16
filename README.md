[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/Maggomann/laravel-addressable/run-tests.yml?branch%3Av0.x&label=tests)](https://github.com/Maggomann/laravel-addressable/actions?query=workflow%3Arun-tests+branch%3Av0.x) [![Total Downloads](https://img.shields.io/packagist/dt/maggomann/laravel-addressable.svg?style=flat-square)](https://packagist.org/packages/maggomann/laravel-addressable)

---

## Work in progress (wip)
This package is still under development. Use at your own risk.

## laravel addressable

This Laravel package provides a minimal trait Addressable to add eloquent models using these addresses. The package will be extended over time. It was directly outsourced as a package before I start using this class modified in different projects.

## Installation

You can install the package via composer:

```console
composer require maggomann/laravel-addressable
```

You can install anything with the command

```bash
php artisan laravel-addressable:install
php artisan migrate
```

Or

---

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="addressable-migrations"
php artisan migrate
```

Optionally, you can publish the configuration file with:

```bash
php artisan vendor:publish --tag="addressable-config"
```

Optionally, you can publish the translation files with:

```bash
php artisan vendor:publish --tag="addressable-translations"
```

## How is it used?

```php

use Illuminate\Database\Eloquent\Model;
use Maggomann\LaravelAddressable\Traits\Addressable;

class Player extends Models
{
    use Addressable;
}

//...
//...

$exampleAttributes = [
    'first_name' => 'first name',
    'last_name' => 'last name',
    'name' => 'name',
    'street_address' => 'street address',
    'street_addition' => 'street addition',
    'postal_code' => 'postal code',
    'city' => 'city',
    'country_code' => 'de',
    'state' => null,
    'company' => null,
    'job_title' => null,
    'is_preferred' => true,
    'is_main' => true,
];

$address = new Address();
$address->fill($exampleAttributes);
$address->withCategory($categoryIdOrCategoryClass);
$address->withGender($genderIdOrGenderClass);

Player::query()
    ->findOrFail(1)
    ->address()
    ->save($address);

```

```php
use Illuminate\Database\Eloquent\Model;
use Maggomann\LaravelAddressable\Traits\Addressable;

class Player extends Models
{
    use Addressable;
}

//...
//...

$exampleAttributes = [
    'first_name' => 'first name',
    'last_name' => 'last name',
    'name' => 'name',
    'street_address' => 'street address',
    'street_addition' => 'street addition',
    'postal_code' => 'postal code',
    'city' => 'city',
    'country_code' => 'de',
    'state' => null,
    'company' => null,
    'job_title' => null,
    'is_preferred' => true,
    'is_main' => true,
];

$addressOne = new Address();
$addressOne->fill($exampleAttributes);
$addressOne->withCategory($categoryIdOrCategoryClass);
$addressOne->withGender($genderIdOrGenderClass);

$addressTwo = new Address();
$addressTwo->fill($exampleAttributes);
$addressTwo->withCategory($categoryIdOrCategoryClass);
$addressTwo->withGender($genderIdOrGenderClass);

$player = Player::query()->findOrFail(1);

$player->addresses()->save($addressOne);
$player->addresses()->save($addressTwo);

// or

$player->addresses()->saveMany(
    collect([
        $addressOne,
        $addressTwo,
    ])
);

```

```php
use Illuminate\Database\Eloquent\Model;
use Maggomann\LaravelAddressable\Domain\Actions\UpdateOrCreateAddressAction;
use Maggomann\LaravelAddressable\Traits\Addressable;

class Player extends Models
{
    use Addressable;
}

//...
//...

$exampleAttributes = [
    'first_name' => 'first name',
    'last_name' => 'last name',
    'name' => 'name',
    'street_address' => 'street address',
    'street_addition' => 'street addition',
    'postal_code' => 'postal code',
    'city' => 'city',
    'country_code' => 'de',
    'state' => null,
    'company' => null,
    'job_title' => null,
    'is_preferred' => true,
    'is_main' => true,
];

$newAddress = app(UpdateOrCreateAddressAction::class)->execute(
    $player,
    AddressData::from($exampleAttributes)
);

// or

$updatedAddress = app(UpdateOrCreateAddressAction::class)->execute(
    $player,
    AddressData::from($exampleAttributes)
    $player->addresses()->first()
);

```

### The address table currently comes with the following attributes:

```php
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
```

### Preinstalled salutations

By default, these are located in the table: address_genders

```php
    'address_genders' => [
        'title' => [
            'male' => 'Mr.',
            'female' => 'Ms.',
            'diverse' => 'Various',
        ],
    ],
```

### Preinstalled categories

By default, these are located in the table: address_categories

```php
    'address_categories' => [
        'title' => [
            'standard' => 'Default address',
            'billing' => 'Billing addres',
            'shipping' => 'Delivery address',
        ],
    ],
```

## Testing

```bash
composer test
composer test:pest-coverage
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Marco Ehrt](https://github.com/Maggomann)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
