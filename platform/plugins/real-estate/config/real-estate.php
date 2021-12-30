<?php

use Botble\RealEstate\Notifications\ConfirmEmailNotification;

return [
    'prefix'                               => 'real_estate_',
    'property_expired_after_x_days'        => env('PROPERTY_EXPIRED_AFTER_X_DAYS', 45),
    'display_big_money_in_million_billion' => env('DISPLAY_BIG_MONEY_IN_MILLION_BILLION', true),

    /*
    |--------------------------------------------------------------------------
    | Notification
    |--------------------------------------------------------------------------
    |
    | This is the notification class that will be sent to users when they receive
    | a confirmation code.
    |
    */
    'notification'                         => ConfirmEmailNotification::class,

    'verify_email' => env('CMS_ACCOUNT_VERIFY_EMAIL', false),

    'properties' => [
        'relations' => [
            'slugable:id,key,prefix,reference_id',
            'city:id,name,state_id',
            'city.state:id,name,country_id',
            'currency:id,is_default,exchange_rate,symbol,title,is_prefix_symbol',
            'category:id,name',
        ],
    ],
];
