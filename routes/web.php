<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    dump(config('repository.generator'));
//    config(['repository.generator.paths.transformers' => 'Shipu']);
//    dump(config('repository.generator'));
//    Artisan::call('make:transformer', [
//        'name' => 'Test'.rand(0,1)
//    ]);
//    dd(config('repository.generator'));
    return view('welcome');
});
