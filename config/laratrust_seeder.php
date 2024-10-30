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
            'genra' => 'r,u,d',
            'movie' => 'r,u,d',
            'roles' => 'c,r,u,d',
            'settings' => 'r,u',
            'permissions' => 'c,r,u,d',
            'sittings' => 'r,u',
            'movies' => 'c,r,u,d',
            'actors' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'genra' => 'r,u,d',
            'movie' => 'r,u,d',
            'roles' => 'r,u',
            'settings' => 'r,u',
            'permissions' => 'r,u',
            'sittings' => 'r,u',
            'movies' => 'c,r,u,d',
            'actors' => 'c,r,u,d',
        ],
        'user' => [
            'profile' => 'r,u',
            'roles' => 'r',
            'genra' => 'r',
            'movie' => 'r',
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
