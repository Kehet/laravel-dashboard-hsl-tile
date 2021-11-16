# A short description of the tile

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kehet/laravel-dashboard-hsl-tile.svg?style=flat-square)](https://packagist.org/packages/kehet/laravel-dashboard-hsl-tile)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kehet/laravel-dashboard-hsl-tile/run-tests?label=tests)](https://github.com/kehet/laravel-dashboard-hsl-tile/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/kehet/laravel-dashboard-hsl-tile.svg?style=flat-square)](https://packagist.org/packages/kehet/laravel-dashboard-hsl-tile)

This tile show HSL (Helsinki Regional Transport Authority) data for given stops

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
composer require kehet/laravel-dashboard-hsl-tile
```

In app\Console\Kernel.php you should schedule the Kehet\HSLTile\FetchDataFromApiCommand to run.
You can let in run every minute if you want. You could also run is less frequently if you fast 
updates on the dashboard aren't that important for this tile.

In the dashboard config file, you must add this configuration in the tiles key. 
The value belgian_trains should be an array of which each value is array with keys departure, destination and label.

```php
// in config/dashboard.php

return [
    'tiles' => [
        'hsl' => [
            'stops' => [
                'HSL:1020602',
            ],
            'refresh_interval_in_seconds' => 60,
        ],
    ],
];
```

To publish required CSS file, you must publish assets

```
php artisan vendor:publish --provider="Kehet\HSLTile\HSLTileServiceProvider"
```

## Usage

In your dashboard view you use the `livewire:hsl-tile` component.

```html
<x-dashboard>
    <livewire:hsl-tile position="a1:a3" />
</x-dashboard>
```

## Testing

``` bash
composer test
```

## Changelog

## 1.0.0 - 2021-11-16

- initial release

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
