[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/Maggomann/laravel-addressable/run-tests.yml?branch%3Av0.x&label=tests)](https://github.com/Maggomann/laravel-addressable/actions?query=workflow%3Arun-tests+branch%3beta)

---

## Work in progress (wip)
This package is still under development. Use at your own risk.

## laravel addressable

This Laravel package provides a minimal trait Addressable to add eloquent models using these addresses.

## How is it used?

```php
$address = new Address();
$address->fill($addressData);

$user->address()->save($address);
```

```php
$address = new Address();
$address->fill($addressData);

$user->addresses()->save($address);
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
