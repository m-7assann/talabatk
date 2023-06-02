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
    'paypal'=>[
        'mode'=>'sandbox',
        'client_id'=>'AXvVB2JijEp6lN162rsurCtVGksbqUpFaoEf_MQeE708EY0o2IH9aXl_4VFYZhmUIeLxYNw1rMZKz3vC',
        'secret'=>'EFUNOX8bbbMktTTw-Uu80Xb_zY69qbQCGHz0WrXaQYu0YhmZzBKocdGH8dC-Wz-kLy1d_mNPQ4TYi-yr'
    ]
];
