<?php

return [

    /*
    false
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

     'facebook'=>[
        'client_id' => '2166492460286699',
        'client_secret' => '9034cf8214d59e4c75bd903033d5ba5a',
        'redirect' => 'https://sanarmbad.com/callback',
    ],

      'line'=>[
      'client_id' => '1639828978',
      'client_secret' => '281aaea7eba6ed5f69dda71ac9a6a98b',
      'redirect' => 'https://sanarmbad.com/callback/line'
    ]
];
