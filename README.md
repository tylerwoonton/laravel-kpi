# Laravel KPI

![Packagist Version](https://img.shields.io/packagist/v/tylerwoonton/laravel-kpi?color=%234299E1&style=for-the-badge)
[![GitHub license](https://img.shields.io/github/license/tylerwoonton/laravel-kpi?color=%234299E1&style=for-the-badge)](https://github.com/tylerwoonton/laravel-kpi/blob/master/LICENCE)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/tylerwoonton/laravel-kpi/Run%20tests?color=4299E1&style=for-the-badge)

A simple package for reporting on KPIs in your Laravel/Lumen applications.


## Installation

To install the package:

Run  `composer require ukfast/laravel-kpi` to add the package to your dependencies.

This will automatically install the package to your vendor folder.

The service provider should be automatically registered, but you may register it manually in your `config/app.php` file:

```php
'providers' => [
    // ...
    TylerWoonton\LaravelKpi\KpiServiceProvider::class,
];  
```

If you want to edit the config, you can publish the config file with the following command:

```php
php artisan vendor:publish --provider="TylerWoonton\LaravelKpi\KpiServiceProvider" --tag="laravel-kpi-config"
```

Finally, you need to publish the package migrations with the following command:

```php
php artisan vendor:publish --provider="TylerWoonton\LaravelKpi\KpiServiceProvider" --tag="laravel-kpi-migrations"
```


## Usage


### Storing KPI Data

You can store KPI data using the `KPI` facade:

```php
// use TylerWoonton\LaravelKpi\Facades\KPI;
KPI::store($slug, ['foo' => 'bar']);
```


## Contributing

All contributions to this package that will be beneficial to the community are welcomed.

All changes should be well-tested and follow [PSR-12](https://www.php-fig.org/psr/psr-12/) standards.

Please refer to the [CONTRIBUTING](CONTRIBUTING.md) file for more information.
