<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stripe API Keys
    |--------------------------------------------------------------------------
    |
    | Here you may specify your Stripe API keys. These keys are used to
    | interact with Stripe's API. Make sure to keep these keys secure
    | and do not expose them in your frontend code.
    |
    */

    'secret' => env('STRIPE_SECRET'),
    'publishable' => env('STRIPE_PUBLISHABLE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Stripe Webhook Secret
    |--------------------------------------------------------------------------
    |
    | If you are using Stripe webhooks, you can configure the webhook secret
    | here. This is used to verify that incoming webhook requests are from
    | Stripe and not from a malicious third party.
    |
    */

    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Stripe Currency
    |--------------------------------------------------------------------------
    |
    | This option controls the default currency that will be used when
    | interacting with Stripe. You can change this to match the currency
    | of your application.
    |
    */

    'currency' => env('STRIPE_CURRENCY', 'usd'),

];
