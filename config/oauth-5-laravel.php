<?php

use OAuth\Common\Storage\Session;

return [

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => new Session(),

    /**
     * Consumers
     */
    'consumers' => [

        'Google' => [
            'client_id'     => '152346529388-i6jnlflrfhui2068spdurl6d42m2cqm2.apps.googleusercontent.com',
            'client_secret' => 'Iijan6lCg0yT0mTJjcygWeg-',
            'scope'         => ['userinfo_email', 'userinfo_profile'],
        ],

    ]

];