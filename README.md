# laravel_5_8
check new possibilities in laravel 5.8 version

- add email validation 

<code><br />
//try in route <br />
Route::get('validation-email', function () {

    try {
        request()->validate([
            'email' => 'email|required'
        ]);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});
</code>

- add multi line support to env

<code><br />
//write in your env <br />
MULTI_STRING="first line with space | <br />
second line with space
"

//try in route <br />
Route::get('env', function () { <br />
&nbsp;&nbsp;&nbsp;&nbsp;return env('MULTI_STRING'); <br />
});
</code>

- change error base layout

<code><br />
//try in route <br />
Route::get('abort', function () { <br />
&nbsp;&nbsp;&nbsp;&nbsp;abort(403); <br />
});
</code>

- change directory in mailable class

<code><br />
//try in console <br />
php artisan make:mail --markdown emails.test TestMailable <br />
php artisan vendor:publish --tag=laravel-mail <br />
//see result in directory "resources/views/vendor/mail"
</code>

- Unquoted MySQL JSON Values

<code><br />
$value = DB::table('users')->value('options->language');

dump($value);

// Laravel 5.7...
'"en"'

// Laravel 5.8...
'en'
</code>

- New notation to array

<code><br />
//see file "vendor/laravel/framework/src/Illuminate/Support/helpers.php" <br />
//example <br />

if (! function_exists('array_collapse')) { <br />
    /**<br />
     * Collapse an array of arrays into a single array.<br />
     *<br />
     * @param  array  $array<br />
     * @return array<br />
     *<br />
     * @deprecated Arr::collapse() should be used directly instead. Will be removed in Laravel 5.9.<br />
     */<br />
    &nbsp;&nbsp;&nbsp;&nbsp;function array_collapse($array)<br />
    &nbsp;&nbsp;&nbsp;&nbsp;{<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return Arr::collapse($array);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;}<br />
}
</code>


- CarbonImmutable::class

<code><br />
//add in file "app/Providers/AppServiceProvider.php" <br />
public function register()<br />
    &nbsp;&nbsp;&nbsp;&nbsp;{<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DateFactory::use(CarbonImmutable::class);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;}<br />
}

//try in route <br />

Route::get('carbon', function () {
    
    $date = Date::now();

    dump($date);

    $newDate = $date->copy->addDays(3);

    dump($newDate);
});
</code>


- CarbonImmutable::class

<code><br />
//add in file "app/Providers/AppServiceProvider.php" <br />
public function register()<br />
    &nbsp;&nbsp;&nbsp;&nbsp;{<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DateFactory::use(CarbonImmutable::class);<br />
    &nbsp;&nbsp;&nbsp;&nbsp;}<br />
}

//try in route <br />

Route::get('carbon', function () {
    
    $date = Date::now();

    dump($date);

    $newDate = $date->copy->addDays(3);

    dump($newDate);
});
</code>
- Cache::remember
<code><br />
//try in route <br />

Route::get('cache', function () {

    return \Illuminate\Support\Facades\Cache::remember('test-cache', 5, function () {
        return time();
    });
});
</code>

- Password 8-character minimum
<code><br />
//try in make:auth <br />
php artisan make:auth
</code>

- Support DynamoDB
<code><br />
'dynamodb' =>  <br />
        [<br />
            'driver' => 'dynamodb',<br />
            'key' => env('AWS_ACCESS_KEY_ID'),<br />
            'secret' => env('AWS_SECRET_ACCESS_KEY'),<br />
            'region' => env('AWS_REGION', 'us-east-1'),<br />
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),<br />
        ],
</code>
