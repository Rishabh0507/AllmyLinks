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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'paypal' => [
        'id' => env('PAYPAL_ID'),
        'secret' => env('PAYPAL_SECRET'),
        'url' => [
            'redirect' => 'http://localhost:8000/execute-payment',
            'cancel' => 'http://localhost:8000/cancel'
        ]
    ],
    //localhost
    'facebook' => [
        'client_id' => '217684499570523',
        'client_secret' => '5cf29131fea7325c6b71ac3e18b79041',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    //server
    // 'facebook' => [
    //     'client_id' => '658266154779021',
    //     'client_secret' => 'd3878e26c727ab6044a22a59311082df',
    //     'redirect' => 'http://likkle.root26.website/login/facebook/callback',
    // ],
];
