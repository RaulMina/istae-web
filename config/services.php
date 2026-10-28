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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
        'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),
        // Modelos que se pueden elegir en admin/chat. Deben ser compatibles con la Responses API y file_search.
        'models' => [
            'gpt-4o-mini' => 'GPT-4o mini (económico, recomendado)',
            'gpt-4o' => 'GPT-4o',
            'gpt-4.1-nano' => 'GPT-4.1 nano (el más económico)',
            'gpt-4.1-mini' => 'GPT-4.1 mini',
            'gpt-4.1' => 'GPT-4.1',
            'gpt-5-mini' => 'GPT-5 mini',
            'gpt-5' => 'GPT-5',
        ],
    ],

];
