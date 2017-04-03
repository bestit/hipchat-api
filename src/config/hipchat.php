<?php
return [
    /*
    |--------------------------------------------------------------------------
    | HipChat Server
    |--------------------------------------------------------------------------
    |
    | URL to the HipChat instance. Leave null if you are not using the
    | self-hosted version with a custom url.
    |
    */

    'server_url' => env('HIPCHAT_SERVER_URL', null),

    /*
    |--------------------------------------------------------------------------
    | HipChat API Token
    |--------------------------------------------------------------------------
    |
    | Your HipChat API Token.
    |
    */

    'api_token' => env('HIPCHAT_API_TOKEN'),
];
