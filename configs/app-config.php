<?php

/**
 *  Application-wide configuration
 *
 **/

return [
    'application' => [
        'domain' => 'academetrics-local.writetospeak.info',

        'view' => [
            'baseTitle' => 'Academetrics',
        ],

        'controllers' => [
            'directory' => 'controllers',

            'invokables' => [
                'home',
                'login',
                'logout',
                'students',
                'subjects',
                'profile',
            ],
            'default' => [
                'controller' => 'home',
                'action' => 'index',
            ],
        ],
    ],

    'database' => [
        'host'     => 'localhost',
        'username' => 'root',
        'password' => 'ugat',
        'database' => 'Academetrics',
        'driver'   => 'mysql',
    ],

    'routes' => [
        'students' => [
            'view' => [
                'student-number'
            ],
        ]
    ],
];