<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superAdmin' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'sittings' => 'r,u',
            'movies' => 'c,r,u,d',
            'actors' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'r,u',
            'sittings' => 'r,u',
            'moviess' => 'c,r,u,d',
            'actors' => 'c,r,u,d',
        ],
        'user' => [
            'profile' => 'r,u',
            'roles' => 'r',
            'movies' => 'r',
            'actors' => 'r',

        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
