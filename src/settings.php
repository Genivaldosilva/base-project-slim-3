<?php

return [
    'settings' => [
        // Slim Settings
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/../templates/views',
            'twig' => [
                'cache' => false,
                'debug' => true,
                'auto_reload' => true
            ]
        ],

        // Database
        'db' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'database',
            'username' => 'user',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'uft8_inicode_ci',
            'prefix' => ''
        ],
    ]
];
