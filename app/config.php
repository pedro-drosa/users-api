<?php
return [
        'settings' => [
            // Slim Settings
            'determineRouteBeforeAppMiddleware' => false,
            'displayErrorDetails' => true,
            // DB Settings
            'db' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'db_users',
                'username' => 'root',
                'password' => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]
        ],
    ];