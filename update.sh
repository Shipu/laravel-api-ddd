#!/usr/bin/env bash
composer require barryvdh/laravel-cors fideloper/proxy guzzlehttp/guzzle optimus/heimdal prettus/l5-repository shipu/laratie spatie/laravel-fractal vinkla/hashids
composer require dingo/api v2.0.0-alpha1
php artisan vendor:publish --tag=tie-config
php artisan vendor:publish --provider "Prettus\Repository\Providers\RepositoryServiceProvider"
php artisan vendor:publish --provider="Dingo\Api\Provider\LaravelServiceProvider"
php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"
php artisan vendor:publish --provider="Vinkla\Hashids\HashidsServiceProvider"
php artisan vendor:publish --provider="Spatie\Fractal\FractalServiceProvider"
php artisan vendor:publish --provider="Optimus\Heimdal\Provider\LaravelServiceProvider"
