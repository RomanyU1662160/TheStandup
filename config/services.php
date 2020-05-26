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

    'github' => [
        'client_id' =>  env('GITHUB_CLIENT_ID', '00d58c9205c306628224'),
        'client_secret' =>  env('GITHUB_CLIENT_SECRET', '0409f6862740fdd79be1aa1218b24253de5520f6'),
        'redirect' => env('GITHUB_URL', 'http://localhost/awp-2-RomanyU1662160/public/login/github/callback'),
    ],


    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', '667249883848539'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', "41728707025dabe662ce1cbcca6d0ce0"),
        'redirect' => env('FACEBOOK_URL', "http://localhost/awp-2-RomanyU1662160/public/facebook/callback"),
    ],
    'linkedin' => [
        'client_id' => env('LINKEDIN_CLIENT_ID', '77m48fs7p86vli'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET', "b5uTpNJb2Mizf09D"),
        'redirect' => env('LINKEDIN_URL', "http://localhost/awp-2-RomanyU1662160/public/linkedin/callback"),
    ],

];
