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
    'google' => [
        'client_id' => '759606228897-2uppimvgdhs32k0gm0fdrb2teovocfdg.apps.googleusercontent.com',
        'client_secret' => 'zRfnzqdH5k2zy_JESJCG-V_R',
        'redirect' => 'http://e-care.com/auth/google/callback',
    ],
    
    'linkedin' => [
        'client_id' => '86yapdobylgm5p',
        'client_secret' => 'KG0Fud8L0Fw9EQtO',
        'redirect' => 'http://e-care.com/auth/linkedin/callback',
    ],


];
