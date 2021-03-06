<?php

return [

    'default' => env('DB_CONNECTION', 'pgsql'),
    'migrations' => 'migrations',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'foo.amazonaws.com'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'database'),
            'username' => env('DB_USERNAME', 'user'),
            'password' => env('DB_PASSWORD', 'password'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE', 'database'),
            'username' => env('DB_USERNAME', 'user'),
            'password' => env('DB_PASSWORD', 'password'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer'
        ]

    ]
];
