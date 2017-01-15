<?php

return [

    /*
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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1896449497254803',
        'client_secret' => '5ec6b588beddd3024fd1952a6d89ed56',
        'redirect' => 'http://varcv.com/login/facebook'
    ],

    'google' => [
        'client_id' => '1074547557184-obp6cn58pnp2brj0nernf19i92t5jo00.apps.googleusercontent.com',
        'client_secret' => 'sH4NsR7nzX6BBIo698zLUjTI',
        'redirect' => 'http://varcv.com/login/google'
    ],

    'linkedin' => [
        'client_id' => '86mx5motedq2t0',
        'client_secret' => 'd59DhlOCFaWp7Luo',
        'redirect' => 'http://varcv.com/login/linkedin'
    ],

    'twitter' => [
        'client_id' => 'gBsvObsl1qXxbnIcVOAFMwj9e',
        'client_secret' => 'XsGIqXTYZWba7JBN5td6phXXAdpa4apBl94U11BSXN8b5LhFFj',
        'redirect' => 'http://varcv.com/login/twitter'
    ],

];
