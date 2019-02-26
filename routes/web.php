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
    return view('welcome');
});

Route::get('validation-email', function () {
    try {
        request()->validate([
            'email' => 'email|required'
        ]);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});

Route::get('env', function () {
    return env('MULTI_STRING');
});

Route::get('abort', function () {
    abort(403);
});

Route::get('carbon', function () {
    $date = Date::now();

    dump($date);

    $newDate = $date->copy->addDays(3);

    dump($newDate);
});

Route::get('cache', function () {
    return \Illuminate\Support\Facades\Cache::remember('test-cache', 5, function () {
        return time();
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
