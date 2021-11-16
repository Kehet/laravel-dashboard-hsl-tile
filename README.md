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

## Usage

In your dashboard view you use the `livewire:hsl-tile` component.

```html
<x-dashboard>
    <livewire:my-tile position="e7:e16" />
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
