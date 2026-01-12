<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'open_weather' => [
        'api_url' => env('OPEN_WEATHER_API_URL'),
        'api_key' => env('OPEN_WEATHER_API_KEY')
    ]
];
